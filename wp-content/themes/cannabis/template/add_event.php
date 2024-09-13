<?php 
/* Template Name: add event */
get_header(); ?>
<style>
    .success {
    color: green;             /* Text color */
    font-size: 16px;          /* Font size */
    font-weight: bold;        /* Make the text bold */
    background-color: #e0ffe0; /* Light green background */
    padding: 10px;            /* Add some padding around the text */
    border: 1px solid #b0d6b0; /* Light green border */
    border-radius: 4px;       /* Rounded corners */
    text-align: center;       /* Center align text */
    margin: 20px 0;           /* Space above and below */
}
.danger {
    color: red;               /* Text color */
    font-size: 16px;          /* Font size */
    font-weight: bold;        /* Make the text bold */
    background-color: #ffe0e0; /* Light red background */
    padding: 10px;            /* Add some padding around the text */
    border: 1px solid #d6b0b0; /* Light red border */
    border-radius: 4px;       /* Rounded corners */
    text-align: center;       /* Center align text */
    margin: 20px 0;           /* Space above and below */
}
    </style>
    <section class="add-new-poadcast-sec common-padd-60 pb-0 light-green-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
            <div class="row common-padd ">
                <div class="common-heading">
                    <div class="common-heading-text">
                        <h2 class="light-green-bg">Add New Event</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?php
                   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                       if (isset($_POST['event_name'])) {
                           $event_name = sanitize_text_field($_POST['event_name']);
                           $event_website = esc_url_raw($_POST['event_website']);
                           $event_description = sanitize_textarea_field($_POST['event_description']);
                           $event_startdate = sanitize_text_field($_POST['event_startdate']);

                           $date = new DateTime($event_startdate);
                           

                            // Get day, month, and year
                            $day = $date->format('d');
                            
                            $month = $date->format('m');
                            
                            $year = $date->format('Y');
                            

                           $event_starttime = sanitize_text_field($_POST['event_starttime']);
                           $event_startdatetime = $event_startdate . ' ' . $event_starttime;
                           $event_enddate = sanitize_text_field($_POST['event_enddate']);
                        //    echo $event_enddate;
                        //    die();
                           $event_endtime = sanitize_text_field($_POST['event_endtime']);
                           $event_enddatetime = $event_enddate . ' ' . $event_endtime;
                           $event_category = sanitize_text_field($_POST['event_category']);
                           $image = $_FILES['event_file'];
                   
                           // Check file type and handle image upload
                           if ($image) {
                               $file_type = wp_check_filetype($image['name']);
                               $allowed_types = array('image/jpeg', 'image/png', 'image/jpg');
                               if (in_array($file_type['type'], $allowed_types)) {
                                   $attachment_id = image_upload($image);
                                   $image_set = true;
                               } else {
                                   $image_set = false;
                               }
                           }
                   
                           $new_podcast = array(
                               'post_title'    => $event_name,
                               'post_content'  => $event_description,
                               'post_status'   => 'Pending',
                               'post_type'     => 'events',
                           );
                           $post_id = wp_insert_post($new_podcast);
                           if (!is_wp_error($post_id)) {
                               update_post_meta($post_id, '_EventStartDate', $event_startdate);
                               update_post_meta($post_id, '_Day', $day);
                               update_post_meta($post_id, '_Month', $month);
                               update_post_meta($post_id, '_Year', $year);

                               update_post_meta($post_id, '_EventEndDate', $event_enddate);

                               update_post_meta($post_id, 'start_time', $event_starttime);
                               update_post_meta($post_id, 'end_time', $event_endtime);

                            //    update_post_meta($post_id, 'hostname', $event_category);
                               update_post_meta($post_id, '_EventURL', $event_website);

                               if (!empty($event_category)) {
                                // Split the categories by comma, trim spaces, and convert to array
                                $categories_array = array_map('trim', explode(',', $event_category));
                                // Assign the categories to the 'events_type' taxonomy
                                wp_set_object_terms($post_id, $categories_array, 'events_type');
                            }

                               if (isset($attachment_id)) {
                                   set_post_thumbnail($post_id, $attachment_id);
                               }
                   
                               $admin_email = 'avisekh.chowdhury@weavers-web.com';
                               $subject = 'New Event Submission';
                               $message = sprintf(
                                   "A new podcast has been submitted:\n\nTitle: %s\nDescription: %s\nWebsite: %s\nHost: %s\n\nPlease review the submission.\n\nView post: %s",
                                   $event_name,
                                   $event_description,
                                   $event_website,
                                   $event_category,
                                   $event_startdatetime,
                                   $event_enddatetime
                                   // get_permalink($post_id)
                               );
                               wp_mail($admin_email, $subject, $message);
                   
                               echo '<p class="success">Form Submitted Successfully</p>';
                           } else {
                               echo '<p class="danger">Form is not Submitted Successfully</p>';
                           }
                       }
                   }
                   
                    ?>
                    <div class="add-new-poadcast-form">
                        <form class="row"  method="post"  enctype="multipart/form-data">
                            <div class="col-lg-6 col-md-6 mb-4">
                              <label for="validationDefault01" class="form-label">Name of Event*</label>
                              <input type="text" class="form-control" name="event_name" id="validationDefault01" placeholder="Enter event name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-4">
                                <label for="validationDefault02" class="form-label">Event Website*</label>
                                <input type="text" class="form-control" name="event_website" id="validationDefault02" placeholder="https://" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Description of Event</label>
                                <textarea class="form-control" name="event_description" id="exampleFormControlTextarea1" rows="3" placeholder="Enter brief description of Event" required></textarea>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-4">
                                <label for="startdate" class="form-label">Start Date*</label>
                                <input type="date" class="form-control" name="event_startdate" id="startdate" required>
                              </div>
                              <div class="col-lg-6 col-md-6 mb-4">
                                <label for="starttime" class="form-label">Start Time*</label>
                                <input type="time" class="form-control" name="event_starttime" id="starttime" required>
                            </div>
                              <div class="col-lg-6 col-md-6 mb-4">
                                  <label for="enddate" class="form-label">End Date*</label>
                                  <input type="date" class="form-control" name="event_enddate" id="enddate" required>
                              </div>
                              <div class="col-lg-6 col-md-6 mb-4">
                                <label for="starttime" class="form-label">End Time*</label>
                                <input type="time" class="form-control" name="event_endtime" id="starttime" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="validationDefault01" class="form-label">Event Category(s)</label>
                                <input type="text" class="form-control" name="event_category" id="validationDefault01" placeholder="Enter host’s name" required>
                                <p class="events-host">Please separate with commas if multiple</p>
                            </div>
                            <div class="col-lg-12 mb-4 choose-file">
                                <label for="validationDefault01" class="form-label">Event Featured Image</label>
                                <div class="art-work-file-choose">
                                    <input type="file" id="real-file" name="event_file" hidden="hidden" required  />
                                    <button type="button" class="choose-btn" id="choose-btn">Choose file</button>
                                    <span id="custom-text">No file chosen</span>
                                </div>
                                <p>Accepted file types: jpg, png, jpeg, </p>
                              </div>
                            <div class="col-12">
                              <button class="btn" type="submit">Submit Event for Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>


