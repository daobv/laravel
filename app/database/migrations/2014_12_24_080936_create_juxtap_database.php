<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJuxtapDatabase extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
         public function up()
         {
            
	    /**
	     * Table: billing_address
	     */
	    Schema::create('billing_address', function($table) {
                $table->increments('billing_address_id');
                $table->integer('user_id')->nullable();
                $table->string('billing_address_1', 50)->nullable();
                $table->string('billing_address_2', 50)->nullable();
                $table->string('billing_address_city', 50)->nullable();
                $table->integer('billing_address_zip')->nullable();
            });


	    /**
	     * Table: campaign_distribution_channels
	     */
	    Schema::create('campaign_distribution_channels', function($table) {
                $table->integer('campaign_id');
                $table->integer('distribution_channel_id');
                $table->string('banner', 64);
                $table->string('link', 128)->nullable();
                $table->index('campaign_id');
                $table->index('distribution_channel_id');
            });


	    /**
	     * Table: campaigns
	     */
	    Schema::create('campaigns', function($table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('name', 255);
                $table->string('alias', 255);
                $table->text('description')->nullable();
                $table->boolean('type')->default("1");
                $table->boolean('status')->default("1");
                $table->boolean('published')->default("1");
                $table->boolean('outcome');
                $table->dateTime('starting_time');
                $table->dateTime('ending_time');
                $table->time('duration');
                $table->integer('vote_qty');
                $table->integer('sale_qty');
                $table->double('sale_value');
            });


	    /**
	     * Table: distribution_channels
	     */
	    Schema::create('distribution_channels', function($table) {
                $table->increments('id');
                $table->string('name', 64);
            });


	    /**
	     * Table: order_items
	     */
	    Schema::create('order_items', function($table) {
                $table->increments('order_item_id');
                $table->integer('order_id')->nullable();
                $table->string('order_items_sku', 20);
                $table->integer('order_item_qty')->nullable();
                $table->float('order_item_price')->nullable();
                $table->float('order_item_total')->nullable();
            });


	    /**
	     * Table: orders
	     */
	    Schema::create('orders', function($table) {
                $table->increments('order_id');
                $table->integer('shipping_address_id');
                $table->integer('billing_address_id');
                $table->integer('shipping_rule_id');
                $table->integer('payment_id');
                $table->integer('campaign_id');
                $table->string('order_first_name', 50);
                $table->string('order_last_name', 50);
                $table->string('order_email', 50);
                $table->string('order_phone', 10)->nullable();
                $table->float('order_tax')->nullable();
                $table->float('order_grand_total')->nullable();
                $table->boolean('order_status')->nullable();
                $table->timestamp('order_created_at');
                $table->index('billing_address_id');
                $table->index('shipping_rule_id');
                $table->index('shipping_address_id');
                $table->index('payment_id');
            });


	    /**
	     * Table: organizations
	     */
	    Schema::create('organizations', function($table) {
                $table->increments('id');
                $table->string('name', 128);
                $table->string('address_1', 128);
                $table->string('address_2', 128)->nullable();
                $table->string('city', 64);
                $table->string('state', 64);
                $table->string('zip', 32);
                $table->integer('country_id');
                $table->string('phone_number', 32);
                $table->string('contact_name', 64)->nullable();
                $table->string('email', 128);
                $table->index('name');
            });


	    /**
	     * Table: password_reminders
	     */
	    Schema::create('password_reminders', function($table) {
                $table->string('email', 64);
                $table->string('token', 64);
                $table->timestamp('created_at');
                $table->index('email');
                $table->index('token');
            });


	    /**
	     * Table: payments
	     */
	    Schema::create('payments', function($table) {
                $table->increments('payment_id');
                $table->string('payment_method', 255);
                $table->integer('user_id')->nullable();
                $table->integer('campaign_id')->nullable();
            });


	    /**
	     * Table: product_color
	     */
	    Schema::create('product_color', function($table) {
                $table->increments('product_color_id');
                $table->string('product_color_name', 45)->nullable();
            });


	    /**
	     * Table: product_images
	     */
	    Schema::create('product_images', function($table) {
                $table->integer('product_id')->nullable();
                $table->string('product_image_path', 20)->nullable();
                $table->string('product_image_thumbnail_path', 20)->nullable();
                $table->index('product_id');
            });


	    /**
	     * Table: product_options
	     */
	    Schema::create('product_options', function($table) {
                $table->increments('product_options_id');
                $table->integer('product_id');
                $table->string('product_options_sku', 20);
                $table->text('product_options_description')->nullable();
                $table->string('product_options_color', 8)->nullable();
                $table->string('product_options_size', 10)->nullable();
                $table->float('product_options_price')->nullable();
            });


	    /**
	     * Table: product_options_images
	     */
	    Schema::create('product_options_images', function($table) {
                $table->increments('product_option_image_id');
                $table->integer('product_options_id')->nullable();
                $table->text('product_option_image_path')->nullable();
                $table->text('product_option_image_thumbnail_path')->nullable();
                $table->index('product_options_id');
            });


	    /**
	     * Table: product_size
	     */
	    Schema::create('product_size', function($table) {
                $table->increments('product_size_id');
                $table->string('product_size_name', 45)->nullable();
            });


	    /**
	     * Table: products
	     */
	    Schema::create('products', function($table) {
                $table->increments('product_id');
                $table->integer('campaign_id')->nullable();
                $table->integer('organization_id');
                $table->integer('user_id');
                $table->string('product_name', 50);
                $table->string('product_sku', 20);
                $table->text('product_description')->nullable();
                $table->string('product_brand', 30)->nullable();
                $table->string('product_upc', 50)->nullable();
                $table->boolean('product_status');
                $table->timestamp('product_created_at');
                $table->timestamp('product_updated_at');
                $table->index('organization_id');
                $table->index('user_id');
            });


	    /**
	     * Table: role_permissions
	     */
	    Schema::create('role_permissions', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('role_id')->unsigned();
                $table->enum('type', array('allow','deny'));
                $table->string('action', 128);
                $table->string('resource', 128);
                $table->timestamp('created_at');
                $table->timestamp('updated_at');
                $table->index('role_id');
            });


	    /**
	     * Table: security_answers
	     */
	    Schema::create('security_answers', function($table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('question_id');
                $table->string('answer', 128);
            });


	    /**
	     * Table: security_questions
	     */
	    Schema::create('security_questions', function($table) {
                $table->increments('id');
                $table->string('question', 255);
            });


	    /**
	     * Table: shipping_address
	     */
	    Schema::create('shipping_address', function($table) {
                $table->increments('shipping_address_id');
                $table->string('shipping_address_1', 255)->nullable();
                $table->string('shipping_address_2', 255)->nullable();
                $table->string('shipping_address_city', 255)->nullable();
                $table->integer('shipping_address_zip')->nullable();
            });


	    /**
	     * Table: shipping_destinations
	     */
	    Schema::create('shipping_destinations', function($table) {
                $table->increments('shipping_destination_id');
                $table->string('shipping_destination_name', 255)->nullable();
            });


	    /**
	     * Table: shipping_methods
	     */
	    Schema::create('shipping_methods', function($table) {
                $table->increments('shipping_method_id');
                $table->string('shipping_method_name', 255)->nullable();
            });


	    /**
	     * Table: shipping_rules
	     */
	    Schema::create('shipping_rules', function($table) {
                $table->increments('id');
                $table->integer('country_id');
                $table->float('standard');
                $table->float('expedited');
                $table->text('standard_description')->nullable();
                $table->text('expedited_description')->nullable();
            });


	    /**
	     * Table: system_configurations
	     */
	    Schema::create('system_configurations', function($table) {
                $table->increments('id');
                $table->string('category', 255);
                $table->string('title', 255);
                $table->string('value', 255);
                $table->text('input_type');
                $table->text('key')->nullable();
            });


	    /**
	     * Table: user_addresses
	     */
	    Schema::create('user_addresses', function($table) {
                $table->increments('user_id');
                $table->string('company', 64)->nullable();
                $table->string('street_addess_1', 64);
                $table->string('street_addess_2', 64)->nullable();
                $table->string('city', 32);
                $table->string('state', 32);
                $table->string('zip', 32);
                $table->integer('country');
                $table->string('phone_number', 40);
                $table->index('user_id');
            });


	    /**
	     * Table: user_roles
	     */
	    Schema::create('user_roles', function($table) {
                $table->increments('id')->unsigned();
                $table->string('role_name', 45);
                $table->string('role_key', 45);
                $table->integer('inherited_roleid')->nullable()->unsigned();
                $table->timestamp('created_at');
                $table->timestamp('updated_at');
            });


	    /**
	     * Table: users
	     */
	    Schema::create('users', function($table) {
                $table->increments('id');
                $table->string('email', 64);
                $table->string('password', 64);
                $table->string('last_name', 64)->nullable();
                $table->string('first_name', 255)->nullable();
                $table->string('power_message', 255)->nullable();
                $table->string('logo', 64)->nullable();
                $table->text('privacy')->nullable();
                $table->integer('role_id');
                $table->integer('organization_id');
                $table->string('remember_token', 64)->nullable();
                $table->timestamp('created_at');
                $table->timestamp('updated_at');
                $table->index('email');
            });


	    /**
	     * Table: vote_info
	     */
	    Schema::create('vote_info', function($table) {
                $table->integer('vote_id');
                $table->integer('campaign_id');
                $table->integer('product_id');
                $table->boolean('voted')->default(0);
                $table->index('vote_id');
                $table->index('campaign_id');
                $table->index('product_id');
            });
             /**
              * Table: countries
              */
             Schema::create('countries', function($table) {
                 $table->increments('id');
                 $table->string('code',8);
                 $table->string('name',32);
             });

	    /**
	     * Table: votes
	     */
	    Schema::create('votes', function($table) {
                $table->increments('id');
                $table->timestamp('created_at');
                $table->string('ip', 32);
                $table->string('social_id', 64)->nullable();
                $table->string('email', 64)->nullable();
                $table->string('credentials', 255)->nullable();
                $table->string('secret_key', 128)->nullable();
                $table->integer('campaign_id');
                $table->integer('product_id');
                $table->string('geo_graphic', 255)->nullable();
            });


         }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
         public function down()
         {
            
	            Schema::drop('billing_address');
	            Schema::drop('campaign_distribution_channels');
	            Schema::drop('campaigns');
	            Schema::drop('distribution_channels');
	            Schema::drop('order_items');
	            Schema::drop('orders');
	            Schema::drop('organizations');
	            Schema::drop('password_reminders');
	            Schema::drop('payments');
	            Schema::drop('product_color');
	            Schema::drop('product_images');
	            Schema::drop('product_options');
	            Schema::drop('product_options_images');
	            Schema::drop('product_size');
	            Schema::drop('products');
	            Schema::drop('role_permissions');
	            Schema::drop('security_answers');
	            Schema::drop('security_questions');
	            Schema::drop('shipping_address');
	            Schema::drop('shipping_destinations');
	            Schema::drop('shipping_methods');
	            Schema::drop('shipping_rules');
	            Schema::drop('system_configurations');
	            Schema::drop('user_addresses');
	            Schema::drop('user_roles');
	            Schema::drop('users');
	            Schema::drop('vote_info');
                Schema::drop('countries');
	            Schema::drop('votes');
         }

}