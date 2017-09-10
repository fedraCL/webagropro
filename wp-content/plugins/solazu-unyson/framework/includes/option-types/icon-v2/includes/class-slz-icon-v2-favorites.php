<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class SLZ_Icon_V2_Favorites_Manager
{
	private $key = 'slz-icon-v2-favorites';

	public function attach_ajax_actions()
	{
		add_action(
			'wp_ajax_slz_icon_v2_update_favorites',
			array($this, 'set_favorites_action')
		);

		add_action(
			'wp_ajax_slz_icon_v2_get_favorites',
			array($this, 'get_favorites_action')
		);

		add_action(
			'wp_ajax_slz_icon_v2_get_icons',
			array($this, 'get_icon_packs')
		);
	}

	public function get_icon_packs()
	{
		wp_send_json_success(
			slz()->backend->option_type('icon-v2')->packs_loader->get_packs(true)
		);
	}

	public function set_favorites_action()
	{
		$favorites = json_decode(SLZ_Request::POST( 'favorites' ), true);

		$this->set_favorites($favorites);

		$this->get_favorites_action();
	}

	public function get_favorites_action()
	{
		wp_send_json(
			$this->get_favorites()
		);
	}

	public function get_favorites()
	{
		return SLZ_WP_Option::get(
			$this->key,
			null,
			array()
		);
	}

	public function set_favorites($favorites)
	{
		SLZ_WP_Option::set(
			$this->key,
			null,
			$favorites
		);
	}
}
