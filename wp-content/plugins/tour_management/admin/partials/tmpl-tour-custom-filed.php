<div class="tour-field">
    <div class="tour-label"><label for="tour_days_title">Title1:</label></div>
    <div class="tour-input"><input type="text" id="tour_days_title" name="tour_days[title]" value="<?php echo isset($tour_days['title']) ? esc_attr($tour_days['title']) : ''; ?>"></div>
</div>
<div class="tour-field">
    <div class="tour-label"><label for="tour_days_description">Description:</label></div>
    <div class="tour-input"><textarea id="tour_days_description" name="tour_days[description]"><?php echo isset($tour_days['description']) ? esc_html($tour_days['description']) : ''; ?></textarea></div>
</div>

<div class="tour-field">
    <div class="tour-label"><label for="tour_days_images">Images:</label></div>
    <div class="tour-input"><input type="text" id="tour_days_images" name="tour_days[images]" value="<?php echo isset($tour_days['images']) ? esc_attr($tour_days['images']) : ''; ?>"></div>
    <small>Enter image URLs separated by commas.</small>
</div>

<div id="repeater-wrapper">
    <h3>Tour Days aa</h3>
    <div id="repeater-fields">
        <?php
        if (isset($tour_days['repeater']) && is_array($tour_days['repeater'])) {
            foreach ($tour_days['repeater'] as $index => $repeater_item) {
        ?>
                <div class="repeater-item">
                    <h4 class="tour-date-title">Day <?php echo $index + 1; ?></h4>
                    <div class="repeater-item-wrapper">
                        <div class="repeater-item-content">
                            <div class="tour-field">
                                <div class="tour-label"><label for="sub_field_1_<?php echo $index; ?>">Title</label></div>
                                <div class="tour-input"><input type="text" id="sub_field_1_<?php echo $index; ?>" name="tour_days[repeater][<?php echo $index; ?>][sub_field_1]" value="<?php echo esc_attr($repeater_item['sub_field_1']); ?>"></div>
                            </div>

                            <label for="sub_field_2_<?php echo $index; ?>">Content</label>
                            <?php
                            $content = isset($repeater_item['sub_field_2']) ? $repeater_item['sub_field_2'] : '';
                            $editor_id = 'sub_field_2_' . $index;
                            wp_editor($content, $editor_id, array(
                                'textarea_name' => "tour_days[repeater][$index][sub_field_2]",
                            ));
                            ?>
                            <label for="sub_field_image_<?php echo $index; ?>">Image:</label>
                            <div id="img-preview_<?php echo $index; ?>"><img src="<?php echo isset($repeater_item['sub_field_image']) ? esc_attr($repeater_item['sub_field_image']) : ''; ?>" width="100px" /></div>
                            <input type="text" id="sub_field_image_<?php echo $index; ?>" class="sub-field-image" name="tour_days[repeater][<?php echo $index; ?>][sub_field_image]" value="<?php echo isset($repeater_item['sub_field_image']) ? esc_attr($repeater_item['sub_field_image']) : ''; ?>">
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