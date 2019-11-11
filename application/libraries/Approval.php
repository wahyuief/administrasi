<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Approval
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function request_approval($user, $type, $table_id, $title, $message)
	{
		$nama_field = 'keg_id';
		$nama_table = 'tb_'.$type;
		$id_pemohon = db_get_data($nama_table, [$nama_field=>$table_id])->keg_created_by;
		$id_posisi_bawahan = db_get_data('aauth_users', ['id'=>$user])->position_id;
		$id_posisi_atasan = db_get_data('tb_position_hierarchy', ['ph_position_id'=>$id_posisi_bawahan])->ph_parent_position_id;
		$id_atasan = db_get_data('aauth_users', ['position_id'=>$id_posisi_atasan])->id;

		$approve_data = array(
			'aprv_table_id' => $table_id,
			'aprv_type' => $type
		);

		if (!db_get_data('tb_approval', $approve_data) && !$id_posisi_atasan) {
			$approve_data['aprv_request_user'] = $user;
			$approve_data['aprv_approve_user'] = 1;
			$this->CI->aauth->send_pms($user, 1, $title, $message);
			$simpan = $this->CI->db->insert('tb_approval', $approve_data);
		}

		if (!db_get_data('tb_approval', $approve_data)) {
			foreach (db_get_all_data('aauth_users', ['position_id'=>$id_posisi_atasan]) as $atasan) {
				$approve_data['aprv_request_user'] = $user;
				$approve_data['aprv_approve_user'] = $atasan->id;
				$this->CI->aauth->send_pms($user, $atasan->id, $title, $message);
				$simpan = $this->CI->db->insert('tb_approval', $approve_data);
			}
			foreach (db_get_all_data('tb_position_hierarchy', ['ph_position_id'=>$id_posisi_atasan]) as $row) {
				$approve_data['aprv_request_user'] = $user;
				$approve_data['aprv_approve_user'] = 0;
				$this->CI->aauth->send_pms($user, 0, $title, $message);
				$simpan = $this->CI->db->insert('tb_approval', $approve_data);
			}
		} else {
			$this->CI->db->set('aprv_status', 1);
			$this->CI->db->where('aprv_table_id', $table_id);
			$this->CI->db->where('aprv_type', $type);
			$this->CI->db->where('aprv_approve_user !=', 0);
			$this->CI->db->update('tb_approval');
			
			$approve_data['aprv_approve_user'] = 0;
			$input['aprv_approve_user'] = $id_atasan;
			$this->CI->aauth->send_pms($user, $id_pemohon, $title, $message);
			$this->CI->db->update('aauth_pms', ['receiver_id'=>$id_atasan, 'message'=>$message], ['sender_id'=>$id_pemohon,'title'=>strtoupper($type).'-'.$table_id,'receiver_id'=>0]);
			$simpan = $this->CI->db->update('tb_approval', $input, $approve_data);
		}

		return $simpan;
	}

}