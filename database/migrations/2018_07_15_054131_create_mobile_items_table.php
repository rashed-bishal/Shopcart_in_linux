<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mobile_brand_id');
            $table->string('model_name')->index();
            $table->string('model_number')->nullable()->index();
            $table->string('in_the_box')->nullable();
            $table->string('color')->nullable();
            $table->string('browse_type')->nullable();
            $table->string('sim_type')->nullable();
            $table->string('hybrid_sim')->nullable();
            $table->string('touchscreen')->nullable();
            $table->string('otg')->nullable();
            $table->string('sound_enhancements')->nullable();
            $table->string('display_size')->nullable();
            $table->string('resolution')->nullable();
            $table->string('resolution_type')->nullable();
            $table->string('gpu')->nullable();
            $table->string('display_type')->nullable();
            $table->string('display_features')->nullable();
            $table->text('other_display_features')->nullable();
            $table->string('os')->nullable();
            $table->string('processor_type')->nullable();
            $table->string('processor_core')->nullable();
            $table->string('clock_speed')->nullable();
            $table->string('operation_freq')->nullable();
            $table->string('internal_storage')->nullable();
            $table->string('ram')->nullable();
            $table->string('expanded_storage')->nullable();
            $table->string('supported_memory_type')->nullable();
            $table->string('memory_slot_type')->nullable();
            $table->string('call_log_memeory')->nullable();
            $table->string('primary_camera_available')->nullable();
            $table->string('primary_camera')->nullable();
            $table->text('primary_camera_features')->nullable();
            $table->string('optical_zoom')->nullable();
            $table->string('secondary_camera_available')->nullable();
            $table->string('secondary_camera')->nullable();
            $table->text('secondary_camera_features')->nullable();
            $table->string('flash')->nullable();
            $table->string('hd_recording')->nullable();
            $table->string('video_recording')->nullable();
            $table->string('video_recording_resolution')->nullable();
            $table->string('digital_zoom')->nullable();
            $table->string('frame_rate')->nullable();
            $table->string('dual_camera_lens')->nullable();
            $table->string('network_type')->nullable();
            $table->string('supported_networks')->nullable();
            $table->string('internet_connectivity')->nullable();
            $table->string('micro_usb')->nullable();
            $table->string('bluetooth_support')->nullable();
            $table->string('bluetooth_version')->nullable();
            $table->string('wifi')->nullable();
            $table->string('wifi_version')->nullable();
            $table->string('nfc')->nullable();
            $table->string('usb_connectivity')->nullable();
            $table->string('audio_jack')->nullable();
            $table->string('gps_support')->nullable();
            $table->string('sim_size')->nullable();
            $table->string('removable_battery')->nullable();
            $table->string('graphics_ppi')->nullable();
            $table->text('sensors')->nullable();
            $table->text('other_features')->nullable();
            $table->text('audio_formats')->nullable();
            $table->text('video_formats')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('depth')->nullable();
            $table->string('weight')->nullable();
            $table->text('warranty_summery')->nullable();
            $table->integer('price')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobile_items');
    }
}
