<?php

class SupplierRequestModel extends CI_Model
{

	/***Table Name****/
	public $offer_list;


	public function __construct()
	{
		parent::__construct();
		$this->config->load('config');
		$this->offer_list = $this->config->item('offer_list');
	}

	public function supplierOfferlist($user_id)
	{
		$this->db->select('*');
		$this->db->from($this->offer_list);
		$this->db->join('buyer_orders', 'offer_list.order_random_id = buyer_orders.order_random_id');
		$this->db->where(['offer_list.supplier_user_id' => $user_id, 'offer_list.buyer_notification_to_supplier' => 1, 'offer_list.ignoreOffer' => 0]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	public function draftOfferlist($user_id)
	{
		$this->db->select('*');
		$this->db->from($this->offer_list);
		$this->db->join('buyer_orders', 'offer_list.order_random_id = buyer_orders.order_random_id');
		$this->db->join('supplier_marked_offer', 'supplier_marked_offer.offer_id_fk = offer_list.offer_id');
		$this->db->where(['offer_list.supplier_user_id' => $user_id, 'offer_list.buyer_notification_to_supplier' => 1, 'supplier_marked_offer.form_status' => 2]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query = $this->db->get();
		return $query->result();
	}


	public function check_Offer($offer_id)
	{
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list', 'offer_list.offer_id = supplier_marked_offer.offer_id_fk');
		$this->db->where(['supplier_marked_offer.offer_id_fk' => $offer_id]);
		$query = $this->db->get();
		return $query->result();
	}
	public function markedResponse($offer_id, $supplier_id)
	{
		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list', 'supplier_marked_offer.offer_id_fk=offer_list.offer_id');
		$this->db->join('buyer_orders', 'buyer_orders.order_random_id=offer_list.order_random_id');
		$this->db->join('users', 'offer_list.supplier_user_id=users.id');
		$this->db->where(['supplier_marked_offer.offer_id_fk' => $offer_id]);
		$query = $this->db->get();

		return $query->result();
	}
	public function OfferSentList($user_id)
	{

		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list', 'offer_list.offer_id=supplier_marked_offer.offer_id_fk');
		$this->db->join('buyer_orders', 'offer_list.order_random_id=buyer_orders.order_random_id');
		$this->db->where(['offer_list.supplier_user_id' => $user_id, ' supplier_marked_offer.form_status' => 1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query = $this->db->get();
		return $query->result();
	}


	public function requestInSupply($user_id)
	{

		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list', 'offer_list.offer_id=supplier_marked_offer.offer_id_fk');
		$this->db->join('buyer_orders', 'offer_list.order_random_id=buyer_orders.order_random_id');
		$this->db->join('users', 'offer_list.supplier_user_id=users.id');
		$this->db->where(['offer_list.supplier_user_id' => $user_id, ' supplier_marked_offer.form_status' => 1, ' supplier_marked_offer.request_wait_response' => 1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query = $this->db->get();
		$aa = $query->result();
		return $query->result();
	}



	public function marks_as_paid($markedOfferId)
	{
		$offerSent = ['supplier_payment_mark_received' => 1];
		$this->db->where('marked_offer_id', $markedOfferId);
		echo   $rntData = $this->db->update('supplier_marked_offer', $offerSent);
	}
	public function transits_mark_as_recieved($markedOfferId, $traking_Info, $logistic)
	{
		$offerSent = ['supplier_delivery_transit_status' => 1];
		$this->db->where('marked_offer_id', $markedOfferId);
		$this->db->update('supplier_marked_offer', array('supplier_delivery_transit_status' => 1, 'traking_Info' => $traking_Info, 'logistic' => $logistic));
		echo   $rntData = $this->db->update('supplier_marked_offer', $offerSent);
	}
	public function rejectOfferfN($random_id, $product_id)
	{
		$product = 'product' . $product_id . '_status';
		$offerSent = [$product => 4];
		$this->db->where('random_offer_id', $random_id);
		$rntData = $this->db->update('supplier_marked_offer', $offerSent);
	}

	public function supplierAcceptfN($random_id, $product_id)
	{
		$product = 'product' . $product_id . '_status';
		$offerSent = [$product => 3];
		$this->db->where('random_offer_id', $random_id);
		$rntData = $this->db->update('supplier_marked_offer', $offerSent);
	}

	public function supplierAcceptNewQty($random_id, $product_id)
	{
		$product = 'product' . $product_id . '_status';
		$offerSent = [$product => 5];
		$this->db->where('random_offer_id', $random_id);
		$rntData = $this->db->update('supplier_marked_offer', $offerSent);
	}

	public function allOrderHistory($user_id)
	{

		$this->db->select('*');
		$this->db->from('supplier_marked_offer');
		$this->db->join('offer_list', 'offer_list.offer_id=supplier_marked_offer.offer_id_fk');
		$this->db->join('buyer_orders', 'offer_list.order_random_id=buyer_orders.order_random_id');
		$this->db->join('users', 'offer_list.buyer_user_id=users.id');
		$this->db->where(['offer_list.supplier_user_id' => $user_id, 'supplier_marked_offer.form_status' => 1, 'buyer_payment_mark_paid' => 1, 'supplier_payment_mark_received' => 1, 'buyer_delivery_transit_status' => 1, 'supplier_delivery_transit_status' => 1]);
		$this->db->order_by("offer_list.offer_id", "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	public function updateAndPublisOffer($data, $offer_id_fk)
	{

		$this->db->where('offer_id_fk', $offer_id_fk);
		echo   $rntData = $this->db->update('supplier_marked_offer', $data);
	}



	public function ignoreOffer($offer_id)
	{
		$ignore = ['ignoreOffer' => 1];
		$this->db->where('offer_id', $offer_id);
		echo   $rntData = $this->db->update('offer_list', $ignore);
	}

	public function allactiOnOffer($offer_id)
	{
		$ignore = ['ignoreOffer' => 1];
		$this->db->where('offer_id', $offer_id);
		echo   $rntData = $this->db->update('offer_list', $ignore);
	}

	public function deleteDraftOffer($offer_id)
	{

		$this->db->where(['offer_id_fk' => $offer_id]);
		$query = $this->db->delete('supplier_marked_offer');

		$this->db->where(['offer_id' => $offer_id]);
		$query = $this->db->delete('offer_list');
	}

    // == ANALYTICS & SCORECARD ================================================

    /** Total bids submitted vs bids accepted (win rate) */
    public function analytics_win_rate($user_id)
    {
        $this->db->select("
            COUNT(DISTINCT offer_list.offer_id) as total_bids,
            SUM(CASE WHEN supplier_marked_offer.form_status = 1 AND supplier_marked_offer.request_wait_response = 1 THEN 1 ELSE 0 END) as accepted_bids");
        $this->db->from('offer_list');
        $this->db->join('supplier_marked_offer', 'supplier_marked_offer.offer_id_fk = offer_list.offer_id', 'left');
        $this->db->where('offer_list.supplier_user_id', $user_id);
        return $this->db->get()->row();
    }

    /** Monthly bids submitted over last 12 months */
    public function analytics_monthly_bids($user_id)
    {
        $this->db->select("DATE_FORMAT(offer_list.created_at, '%b %Y') as month_label,
            DATE_FORMAT(offer_list.created_at, '%Y-%m') as month_key,
            COUNT(*) as total_bids");
        $this->db->from('offer_list');
        $this->db->where('offer_list.supplier_user_id', $user_id);
        $this->db->where("offer_list.created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)");
        $this->db->group_by('month_key');
        $this->db->order_by('month_key', 'ASC');
        return $this->db->get()->result();
    }

    /** Bids per category the supplier serves */
    public function analytics_bids_by_category($user_id)
    {
        $this->db->select('category.name, COUNT(offer_list.offer_id) as bid_count');
        $this->db->from('offer_list');
        $this->db->join('buyer_orders', 'offer_list.order_id_fk = buyer_orders.order_id', 'left');
        $this->db->join('category', 'buyer_orders.product_assign_category = category.id', 'left');
        $this->db->where('offer_list.supplier_user_id', $user_id);
        $this->db->group_by('buyer_orders.product_assign_category');
        $this->db->order_by('bid_count', 'DESC');
        return $this->db->get()->result();
    }

    /** Average buyer rating for this supplier */
    public function analytics_avg_rating($user_id)
    {
        // Uses buyer_feedback table (good_quality, delivery_speed, attitute averaged)
        if (!$this->db->table_exists('buyer_feedback')) {
            return (object)['avg_rating' => 0, 'rating_count' => 0];
        }
        $this->db->select('ROUND(AVG(average), 1) as avg_rating, COUNT(*) as rating_count');
        $this->db->from('buyer_feedback');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }

    /** Top buyers by number of interactions */
    public function analytics_top_buyers($user_id)
    {
        $this->db->select('users.username, users.id as buyer_id, COUNT(offer_list.offer_id) as order_count');
        $this->db->from('offer_list');
        $this->db->join('users', 'offer_list.buyer_user_id = users.id', 'left');
        $this->db->where('offer_list.supplier_user_id', $user_id);
        $this->db->group_by('offer_list.buyer_user_id');
        $this->db->order_by('order_count', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

}
