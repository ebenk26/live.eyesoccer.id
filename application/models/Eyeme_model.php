<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'models/Master_model.php');

class Eyeme_model extends Master_model
{

	public function get_all_member()
	{
		$query = $this->db->get('tbl_member');

		return $query->result();
	}

	public function get_member($id)
	{
		$this->db->from('tbl_member')
				->where('id_member', $id);

		$query = $this->db->get();
		return $query->result();
	}	

	public function get_all_konten()
	{
		$query = $this->db->query("	SELECT
										A.id_member,
										A.id,
										A.gambar,
										A.base,
										A.keterangan,
										A.suka,
										A.komentar,
										A.created_date,
										B.name
									
									FROM
										me_eyeme A
									LEFT JOIN
										tbl_member B on B.id_member = A.id_member
									WHERE 
										A.id != ''
									ORDER BY 
										A.id DESC
								")->result_array();
//var_dump($query);exit();
		return $query;
	}

	public function get_konten($id)
	{
		$this->db->from('tbl_eyeme')
				->where('id', $id)
				->order_by('id', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_komentar()
	{
		$this->db->from('tbl_komentar');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_komentar($id_eyeme)
	{
		$query = $this->db->query("	SELECT
										A.id_member,
										A.isi,
										A.created_date,
										B.id as id_eyeme,
										C.name
									FROM
										tbl_komentar A
									LEFT JOIN
										tbl_eyeme B on B.id = A.id_eyeme
									LEFT JOIN
										tbl_member C on C.id_member = B.id_member
									WHERE
										A.id_eyeme = ".$id_eyeme."
								")->result_array();
		// var_dump($query);exit();
		return $query;
	}

	public function add_komentar($data)
	{
		$this->db->insert('tbl_komentar', $data);
		return $this->db->insert_id();
	}

	public function add_suka($data)
	{//var_dump($data['id_eyeme']);exit();
		$this->db->insert('tbl_suka', $data);

		return $this->db->insert_id();
	}

	public function count_suka($id_eyeme)
	{
		$this->db->like('id_eyeme', $id_eyeme);
		$this->db->from('tbl_suka');
		$query = $this->db->count_all_results();

		return $query;
	}

	public function update_eyeme($id_eyeme,$count_like)
	{
		$object 	= array('suka'=>$count_like);
		$this->db->where('id', $id_eyeme);
		$this->db->update('tbl_eyeme', $object);
	}

	public function friends($id_user)
	{
	// { var_dump($id_user);exit();
		
		$query = $this->db->query("	SELECT
										*
									FROM
										tbl_friend
									WHERE
										id_pengajak = ".$id_user."
								")->result_array();
		return $query;
	}
	


	#sw::begin 
	/**
	  *function get Explore
	*/
	public function getExplore(){
		$getImg = $this->mod->getAll('me_img','','',array('last_update'=> 'DESC'),20);

		for($i= 0 ; $i < count($getImg); $i++){
			$qry     = "SELECT 
							* 
						FROM tbl_member AS A			
						WHERE A.id_member = {$getImg[$i]->id_member}";

			$dp      = $this->db->query($qry)->result();
			
			$like    = $this->mod->getAll('me_like',
								array('id_img'=>$getImg[$i]->id_img),
								array('id_like','id_member'));

			$comment = $this->mod->getAll('me_comment',
								array('id_img' => $getImg[$i]->id_img));
			
			$getImg[$i]->username     = $dp[0]->username;
			$getImg[$i]->countLike    = count($like);
			$getImg[$i]->countComment = count($comment);

			$getImg[$i]->comment      = $comment;
		}
		return $getImg;
	}

	/**
	  *fungsi getProfile:: to get user profile by id or username
	  *@param $id_or_username in url
	
	*/
	public function getProfile($id_or_username){

		$query = "SELECT 
				A.id_member,
				A.username,
				A.name,
				A.profile_pic,
				A.gender,
				A.about AS bio

				FROM tbl_member
				AS A
				where (A.id_member = '$id_or_username') OR (A.username = '$id_or_username')";

		$get = $this->db->query($query);
		$result  = $get->result();
		if(count($result) > 0){
			//get profile_pic name from tbl_gallery
			$where = array('id_gallery'=> $result[0]->profile_pic);
			$select = array('pic','thumb1');
			$getPic = $this->getAll('tbl_gallery',$where,$select);

			$result[0]->display_picture = (count($getPic) > 0 ? $getPic[0]->pic : '');
		}
		return $result;

	}
	/**
		*fungsi getWhereIn:: to get table where in 
		*@param $tbl = table selected
		*@param where = where colomn condition
		*@param where_in as array where colomn in 

	*/
	public function getWhereIn($tbl,$where, $inArr=array()){

		$this->db->where_in($where,$inArr);
		$res = $this->db->get($tbl);
		return $res;

	}
	
	/**
		*fungsi getImgFollowing:: to get img who following by member
		*@param $id_member = member has login
		*@return $return as array 	

	*/
	public function getImgFollowing($id_member){
		$query = "SELECT 
					A.id_img,
					A.img_caption,
					A.id_member,
					A.img_name,
					A.img_alt,
					A.last_update,
					A.date_create,
					C.profile_pic,
					C.username

				 FROM me_img  as A 
				 LEFT JOIN tbl_member as C 
				 on A.id_member = C.id_member
				 WHERE  A.id_member IN
				 (SELECT id_following from me_follow where id_member = $id_member) 
				 AND A.active='1' OR A.id_member = $id_member
				 ORDER BY A.last_update DESC";

		$res = $this->db->query($query);

		if(count($res) > 0 ){
			$return = $res->result();

		}
		else {
			$return = array();

		}
		return $return;

	}
	/**
	*fungsi getImg:: to get Image by Id_img
	*@param id_img 
	*@return result as array ()

	*/
	public function getImg($id_img){

		$query = "SELECT 
				A.id_img,
				A.img_caption,
				A.id_member,
				A.img_name,
				A.img_alt,
				A.date_create,
				A.last_update,
				C.profile_pic,
				C.username
				FROM me_img AS A
				INNER JOIN tbl_member as C
				ON A.id_member = C.id_member
				WHERE A.id_img = $id_img AND A.active = '1'";

		if($id_img == '' || $id_img == NULL){
			return false;
		}
		else{
			$get  = $this->db->query($query);
			$get  = $get->result();
			if(count($get) > 0 ){
				$where = array('id_gallery' => $get[0]->profile_pic);
				$getGallery = $this->getAll('tbl_gallery',$where,array('pic','thumb1'));
				$get[0]->display_picture = (count($getGallery) > 0 ? $getGallery[0]->pic : '');

			}

			return $get;
		}
	}
	public function getAllImg($id_img){
		$where      = array('id_img' => $id_img);

		$this->id_member = $this->session->id_member;
		$getImg     = $this->emod->getImg($id_img,$where);
		$hasLike    = $this->emod->hasLike($this->id_member,$id_img);
		$getLike    = $this->mod->getAll('me_like',$where);
		$getComment = $this->emod->getComment($id_img);
		if(!count($getImg) > 0 ){
			redirect(MEURL,'refresh');

		}
		$getImg[0]->like         = $getLike;
		$getImg[0]->countLike    = count($getLike);
		$getImg[0]->countComment = count($getComment);
		$getImg[0]->comment      = $getComment;
		$distance                = getDistance(NOW,$getImg[0]->last_update);#jarak waktu 
		$getTime                 = getTime($distance); #mengambil waktu last_update
		$day                     = $getTime['day'];
		$hours                   = $getTime['hours'];
		$minute                  = $getTime['minute'];
		$secon				     = $getTime['secon'];
		$timeString              = $getTime['timeString'];
		$getImg[0]->timeString   = $timeString;
		$getImg[0]->has_like     = $hasLike;
		$getImg[0]->self         = $this->id_member;
		return $getImg;
	}
	/**
	*fungsi getComment::  to get comment 
	*@param $id_img id dari gambar yang dikomen
	*@param $limit array, array[0] =offset array[1] = limit

	*/
	public function getComment($id_img,$limit=array()){
		$query = "  SELECT 
						a.id_comment,
						a.id_member,
						a.id_img,
						a.comment,
						a.date_create,
						a.last_update,
						c.username
					FROM me_comment AS a
					INNER JOIN tbl_member AS c
					ON a.id_member = c.id_member
					WHERE a.id_img = $id_img
					ORDER BY last_update
					ASC
						 ";
		$query  = ($limit == null || !is_array($limit) ? $query: $query.'LIMIT '. $limit[0].','.$limit[1]);
		if(!$id_img){
			return false;
		}
		else{
			$res    = $this->db->query($query);
			$res    = $res->result();
			return $res;
		}

		


	}
	/**
	*@param $data = array() data yang akan di input ke dalam database table me_comment;
	*@return JSON or FALSE;
	*fungsi post_comment:: 
	*/
	public function postComment($data = array()){
	
		$insertComment = $this->db->insert('me_comment',$data);
		$comment_id    = $this->db->insert_id();

		$select      = array('id_member','id_img','img_name','img_name','img_alt');
		$getIdMember = $this->getAll('me_img',array('id_img'=> $data['id_img']),$select); 
		#mengambil id_member yang mempunyai gambar
		$id_img        = $getIdMember[0]->id_img;
		$id_member_img = $getIdMember[0]->id_member;
		$img_name     = $getIdMember[0]->img_name;
		$img_alt  	   = $getIdMember[0]->img_name;

		$dataNotif     = array(
				'id_member'     => $id_member_img, # yang menerima notif comment
				'id_member_act' => $data['id_member'], #yang memberi notif comment
				'id_img'		=> $id_img,
				'notif_type'    => 'COM'.$comment_id,
				'notif_content' => $data['comment'],
				'img_name'		=> $img_name,
				'img_alt'	    => $img_alt,
				'date_create'   => NOW,
				'last_update'   => NOW);

		$insertNotif   = $this->db->insert('me_notif',$dataNotif); #insert data ke dalam table me_notif
	
		if($insertComment == TRUE AND $insertNotif== TRUE){

			$json = json_encode($data);
			return  $json;

		}
		else{
			return FALSE;
		}

	}
	/*fungsi untuk mengambil like berdasarkan id img*/
	public function getLike($id_img){

		$query = "SELECT 
					a.id_like,
					a.id_member,
					a.id_img,
					a.last_update,
					b.username,
					b.profile_pic
				  FROM me_like as a
				
				  INNER JOIN tbl_member as b
				  ON a.id_member =  b.id_member
				  
				  WHERE a.id_img = $id_img";

		$res   = $this->db->query($query);
		$res   = $res->result();
		for($i=0;$i < count($res);$i++){

			$where = array('id_gallery',$res[$i]->profile_pic);
			$get   = $this->getAll('tbl_gallery',$where,array('pic'));
			$res[$i]->display_picture = (count($get) > 0 ? $get[0]->pic : '');
		}
		#echo $this->db->last_query();
		return $res; 

	}
	/**
	*@param $id_member member do like
	*@param $id_img image like
	*fungsi hasLike untuk mengecheck kondisi apakah sudah dilike oleh user 
	*/
	public function hasLike($id_member,$id_img){
		$where = array('id_member'=> $id_member,'id_img'=> $id_img);
		$get   = $this->getAll('me_like',$where);
		if(count($get) > 0 ){

			return TRUE;
		}
		else return FALSE;

	}
	public function unLike($id_member,$id_img){
		$this->db->where('id_member',$id_member);
		$this->db->where('id_img',$id_img);
		$delete = $this->db->delete('me_like');
		return $delete;

	}
	/**
	*@param id_member yang sedang login
	*@param id_img gambar yang di like
	*fungsi untuk menambahkan like kedalam database

	*/
	public function addLike($id_member,$id_img){
		$dataLike   = array('id_member'=> $id_member,
						'id_img'   => $id_img, #bugs
						'last_update'=> NOW);

		$insertLike = $this->db->insert('me_like',$dataLike);#insert data ke dalam table me_like
		$like_id    = $this->db->insert_id();#mengambil last_id

		$select      = array('id_member','id_img','img_name','img_alt');
		$getIdMember = $this->getAll('me_img',array('id_img'=> $id_img),$select); 
		#mengambil id_member yang mempunyai gambar
		$id_img        = $getIdMember[0]->id_img;
		$id_member_img = $getIdMember[0]->id_member;
		$img_alt  	   = $getIdMember[0]->img_name;

		$dataNotif  = array(
				'id_member'     => $id_member_img, # yang menerima notif like 
				'id_member_act' => $id_member, #yang memberi notif like
				'id_img'	    => $id_img,#id gambar yang di beri notif
				'notif_type'    => 'LIK'.$like_id,
				'notif_content' => 'LIKE',
				'img_alt'		=> $img_alt,
				'date_create'   => NOW,
				'last_update'   => NOW);
		$insertNotif   = $this->db->insert('me_notif',$dataNotif); #insert data ke dalam table me_notif
		if($insertLike == TRUE AND $insertNotif == TRUE){

			return TRUE;

		}
		else{
			return FALSE;
		}

	}

	/**
	*@param $id_member
		fungsi mengambil notifikasi getNotif::
	*/
	public function getNotif($id_member,$limit=''){
		#$where    = array('id_member'=> $id_member);
		#$getNotif = $this->getAll('me_notif',$where,'',array('last_update','DESC','0,5'));
		$query    = "SELECT 
						A.`id_notif`,
						A.`id_member`,
						A.`id_member_act`,
						A.`id_img`,
						A.`img_name`,
						A.`img_alt`,
						A.`notif_type`,
						A.`notif_content`,
						A.`last_update`,
						A.`read`,
						C.`profile_pic`,
						C.`username`
					FROM `me_notif` AS A
					INNER JOIN `tbl_member` AS C
					ON A.`id_member_act` = C.`id_member`
					WHERE A.`id_member` = $id_member AND A.`id_member_act` <> $id_member
					ORDER BY last_update DESC
					";
		if($limit != ''){
			$query .= $limit;
		}
		$getNotif  = $this->db->query($query);
		return $getNotif->result();
	}

	/**
	*function checkFollowed melihat kondisi apakah member telah follow akun 
	*@param id_member = id member has login
	*@param id_follow = id user yang di follow
	
	*/
	public function checkFollowed($id_member,$id_follow){
		$where    = array('id_member' => $id_member,
						'id_following'   => $id_follow);
		$find     = $this->getAll('me_follow',$where);
		if(count($find) > 0){
			return TRUE;
		}
		else return FALSE;
	}
	/**
	*follow::
	*id_member = id member yang mengikuti
	*id_friend = id member yang diikuti
	*/
	public function follow($id_member,$id_friend){
		$data      = array('id_member'=> $id_member,
							'id_following' => $id_friend,
							'last_update'  => NOW);

		$exe       = $this->db->insert('me_follow',$data);
		$dataNotif     = array(
				'id_member'     => $id_friend, # yang menerima notif comment
				'id_member_act' => $id_member, #yang memberi notif comment
				'id_img'		=> NULL,
				'notif_type'    => 'FOL',
				'notif_content' => 'FOLLOW',
				'img_alt'	    => NULL,
				'date_create'   => NOW,
				'last_update'   => NOW);

		$insertNotif    = $this->db->insert('me_notif',$dataNotif); #insert data ke dalam table me_notif
		$getFollower    = $this->getAll('me_follow',array('id_following'=>$id_friend,'block' => '0'));
		$getFollowing   = $this->getAll('me_follow',array('id_member'=>$id_friend,'block' => '0'));
		$return         = array('follower' => count($getFollower),
								'following' => count($getFollowing));
		                //mengambil jumlah follower dari member yang kita ikuti
		return $return;

	}
	public function unFollow($id_member,$id_friend){
		
		$id_friend  = $id_friend;

		$this->db->where('id_member',$id_member);
		$this->db->where('id_following',$id_friend);
		$exe = $this->db->delete('me_follow');
		#echo $this->db->last_query();
		$getFollower    = $this->getAll('me_follow',array('id_following'=>$id_friend,'block' => '0'));
		$getFollowing   = $this->getAll('me_follow',array('id_member'=>$id_friend,'block' => '0'));
		$return         = array('follower' => count($getFollower),
								'following' => count($getFollowing));
		                //mengambil jumlah follower dari member yang kita ikuti

		return $return;
		

	}
	/**
		*@param id_member id_member yang login 
		*fungsi getFollow::

	*/
	public function getFollow($id_member,$find = 'following'){
		#echo $id_member;

		
		$qry     = "SELECT
					A.id_member,
					A.id_following,
					A.id_follow,
					B.username,
					B.name,
					B.profile_pic,
					B.id_member AS id_member_fol

					FROM 
					me_follow As A
					INNER JOIN 
					tbl_member As B
					ON 
					".($find == "follower" ?
					 "A.id_member = B.id_member WHERE A.id_following = {$id_member}"
					 : "A.id_following = B.id_member WHERE A.id_member   = {$id_member}")."

					";
		#echo $qry;
				
		$exe     = $this->db->query($qry);
		$exe     = $exe->result();
		//ganti profile pic
		for($i=0;$i<count($exe);$i++){
			#echo $exe[$i]->profile_pic;
			$where   = array('id_gallery' => $exe[$i]->profile_pic);
			$getProfilePic     = $this->getAll('tbl_gallery',$where);

			//ganti profile_pic ,menjadi nama gambar 
			$exe[$i]->profile_pic   = (count($getProfilePic) > 0 ? $getProfilePic[0]->pic : '' );
		
			$exe[$i]->checkFollowed = $this->checkFollowed($id_member,$exe[$i]->id_member_fol);

		}
		
	return $exe;

	}

	public function addComment($data= array()){
		$insert = $this->db->insert('me_comment',$data);
		if($insert == TRUE){

			return TRUE;
		}
		else return FALSE;
	}

	public function rm($tbl,  $where = array() ){
		if(is_array($where)){

			foreach($where as $k => $v){
				$this->db->where($k,$v);
			}

		}
		$exe  = $this->db->delete($tbl);
		if($exe == TRUE){

			return 'success';
		}
		else{
			return 'Failed';
		}
	}
	/**
	*@param $tbl table where in select
	*@param $id  id dari table select
	* fungsi whereImageIn untuk mengambil data dari table image yang berelasi dengan id_img dan $tbl
	*/
	public function whereImageIn($tbl,$id){
		$query = "
			SELECT 
				*
			FROM 
				`me_img` AS A
			WHERE id_img 
				IN(SELECT `id_img` FROM `me_$tbl` WHERE id_$tbl = $id)";
		$exe  = $this->db->query($query);
		
		return $exe->result();
	}
	public function insertImg($imageName,$caption,$id_member){
		$data = array('img_name'=> $imageName,
					 'id_member'  => $id_member,
					 'img_caption' => $caption,
					 'img_alt'    => substr($caption, 0,30),
					 'date_create' => NOW,
					 'last_update'  => NOW,
					 'active'      => '1');
		$insert = $this->db->insert('me_img',$data);
		return $insert;
	}
	public function getUser(){
		$where  = array('active'=> '1','verification'=> '1');
		$select = array('id_member','name','fullname','username','email','profile_pic');
		$order  = array('last_online');
		$limit  = '5';
		$user   = $this->getAll('tbl_member',$where,$select,$order,$limit);
		if(count($user) > 0 ){
			for($i = 0; $i< count($user);$i++){

			$whereImg = array('id_gallery' => $user[0]->profile_pic);
			$select   = array('pic');
			$img      = $this->mod->getAll('tbl_gallery',$whereImg,$select);
			$user[0]->profile_pic = (count($img) > 0 ? $img[0]->profile_pic : '' );
			
			}
		}
		return $user;
	}
	public function getImgUser(){
		$where  = '';
		$select = '';
		$order = array('last_update','DESC');
		$limit = '10';

		$get   = $this->mod->getAll('me_img',$where,$select,$order,$limit);
		foreach($get as $k => $v){
			$whereUser = array('id_member'=> $v->id_member);
			$user      = $this->mod->getAll('tbl_member',$whereUser,array('username'));
			$v->username = (count($user) > 0 ? $user[0]->username : '' );
		}

		return $get;

	}
	
	//sw::end
	/*public function unlike($arr = array()){

		if(is_array($arr)){

			foreach($id as $k => $v){
				$this->db->where($k,$v)
			}


		}
		#$this->db->where('id_like'=> $id_img);
		$exe = $this->db->delete('me_like');
		if($exe == TRUE){


			echo 'success';


		}
		else{
			echo 'false';
		}
	}*/

}

/* End of file Eyeme_model.php */
/* Location: ./application/models/Eyeme_model.php */