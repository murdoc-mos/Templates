<?php

class freearchAdminForm extends ThemeFormModel
{
	/*
	 * Define any keys here that should be available for the theme
	 * These can be accessed via Yii::app()->theme->keyname
	 *
	 * The values specified here are defaults for your theme
	 *
	 * keys that are in ALL CAPS are written as xlsws_configuration keys as well for
	 * backwards compatibility.
	 */
	public $CHILD_THEME = "blue"; //Required, to be backwards compatible with CHILD_THEME key

	public $CATEGORY_IMAGE_HEIGHT = 180;
	public $CATEGORY_IMAGE_WIDTH = 180;
	public $DETAIL_IMAGE_HEIGHT = 256;
	public $DETAIL_IMAGE_WIDTH = 256;
	public $LISTING_IMAGE_HEIGHT = 190;
	public $LISTING_IMAGE_WIDTH = 180;
	public $MINI_IMAGE_HEIGHT = 30;
	public $MINI_IMAGE_WIDTH = 30;
	public $PREVIEW_IMAGE_HEIGHT = 30;
	public $PREVIEW_IMAGE_WIDTH = 30;
	public $SLIDER_IMAGE_HEIGHT = 90;
	public $SLIDER_IMAGE_WIDTH = 90;

	public $PRODUCTS_PER_PAGE = 12;


	public $homePageGraphic;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('CHILD_THEME,homePageGraphic','required'),
//			array('username,password,accesskey', 'validateUserInfo'),
//			array('username,password,accesskey,markup','safe'),
		);
	}


	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'CHILD_THEME'=>ucfirst(_xls_regionalize('color')).' set',
			'homePageGraphic'=>'Home page graphic',
		);
	}

	public function getAdminForm()
	{

		return array(
			'title' => 'Set your funky options for this theme!',

			'elements'=>array(
				'CHILD_THEME'=>array(
					'type'=>'dropdownlist',
					'items'=>array('red'=>'Red','blue'=>'Blue','purple'=>'Purple'),
				),

//				'homePageGraphic'=>array(
//					'type'=>'text',
//					'maxlength'=>64,
//				),

				'homePageGraphic'=>array(
					'type'=>'dropdownlist',
					'items'=>Gallery::ImageList(1),
				),

			),
		);
	}




}