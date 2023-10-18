<div class="tour-field">
    <div class="tour-label"><label for="total_tour_days">Total Days:</label></div>
    <div class="tour-input"><input type="text" id="total_tour_days" name="tour_days[total_days]" value="<?php echo isset($tour_days['total_days']) ? esc_attr($tour_days['total_days']) : ''; ?>"></div>
</div>
<div class="tour-field">
    <div class="tour-label"><label for="tour_days_disatance">Total Disatance :</label></div>
    <div class="tour-input"><input type="text" id="tour_days_disatance" name="tour_days[total_disatance]" value="<?php echo isset($tour_days['total_disatance']) ? esc_attr($tour_days['total_disatance']) : ''; ?>"></div>
</div>

<div class="tour-field">
    <div class="tour-label"><label for="tour_days_stops">Tour Stops:</label></div>
    <div class="tour-input"><input type="text" id="tour_days_stops" name="tour_days[total_stops]" value="<?php echo isset($tour_days['total_stops']) ? esc_attr($tour_days['total_stops']) : ''; ?>"></div>
    <small>Enter stops separated by commas.</small>
</div>

<div id="repeater-wrapper">
    <h3>Tour Itineraries Item</h3>
    <div id="repeater-fields">
        <?php
        if (isset($tour_days['repeater']) && is_array($tour_days['repeater'])) {
            foreach ($tour_days['repeater'] as $index => $repeater_item) {
                // var_dump($repeater_item);
        ?>
                <div class="repeater-item">
                    <h4 class="tour-date-title">Day <?php echo $index + 1; ?></h4>
                    <div class="repeater-item-wrapper">
                        <div class="repeater-item-content">
                            <div class="tour-field">
                                <div class="tour-label"><label for="tour_itineraies_item_title_<?php echo $index; ?>">Title</label></div>
                                <div class="tour-input"><input type="text" id="tour_itineraies_item_title_<?php echo $index; ?>" name="tour_days[repeater][<?php echo $index; ?>][tour_itineraies_item_title]" value="<?php echo esc_attr($repeater_item['tour_itineraies_item_title']); ?>"></div>
                            </div>
                            <div class="tour-field">
                                <label for="tour_itineraries_date_content_<?php echo $index; ?>">Content</label>
                                <?php
                                $content = isset($repeater_item['tour_itineraries_date_content']) ? $repeater_item['tour_itineraries_date_content'] : '';
                                $editor_id = 'tour_itineraries_date_content_' . $index;
                                wp_editor($content, $editor_id, array(
                                    'textarea_name' => "tour_days[repeater][$index][tour_itineraries_date_content]",
                                ));
                                ?>
                            </div>
                            <div class="tour-field">
                                <label for="tour_itineraries_date_heightlight_<?php echo $index; ?>">Tour Highlights</label>
                                <?php
                                $content = isset($repeater_item['tour_itineraries_date_heightlight']) ? $repeater_item['tour_itineraries_date_heightlight'] : '';
                                $editor_id = 'tour_itineraries_date_heightlight_' . $index;
                                wp_editor($content, $editor_id, array(
                                    'textarea_name' => "tour_days[repeater][$index][tour_itineraries_date_heightlight]",
                                    'editor_height' => 200,
                                ));
                                ?>
                            </div>
                            <label for="tour_itineraries_date_image_<?php echo $index; ?>">Image:</label>

                            <div id="img-preview_<?php echo $index; ?>">
                                <?php
                                if (!empty($repeater_item["tour_itineraries_date_image"])) {
                                    $image_ids =  explode(",", $repeater_item['tour_itineraries_date_image']);

                                    foreach ($image_ids as $image_id) {
                                        $img_url = wp_get_attachment_image_url($image_id, 'medium');

                                        echo "<img src=\"$img_url\" width=\"100\">";
                                    }
                                    // $image_url = !empty($tour_meta["tour_itineraries_date_image"]) ? (wp_get_attachment_image_url($tour_meta["tour_itineraries_date_image"], 'medium')) : '';
                                }
                                ?>

                            </div>
                            <input type="text" id="tour_itineraries_date_image_<?php echo $index; ?>" class="sub-field-image" name="tour_days[repeater][<?php echo $index; ?>][tour_itineraries_date_image]" value="<?php echo isset($repeater_item['tour_itineraries_date_image']) ? esc_attr($repeater_item['tour_itineraries_date_image']) : ''; ?>">
                            <button class="upload-image-button" id="upload_image_button_<?php echo $index; ?>">Upload Image</button>
                        </div>
                        <button class="remove-repeater-item">Remove</button>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <button id="add-repeater-item" class="btn-add-repeater-item">Add Item</button>
</div>