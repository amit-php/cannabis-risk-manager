<?php
/* Template Name: Poadcast */ 
echo get_header() ; 

?>
<style>
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
          <?php  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['cpname']) && isset($_POST['cpdescription']) && isset($_POST['cpwebsite']) && isset($_POST['cphost']) && isset($_FILES['cpfile'])) {
                $cpname = sanitize_text_field($_POST['cpname']);
                $cpdescription = sanitize_textarea_field($_POST['cpdescription']);
                $cpwebsite = esc_url_raw($_POST['cpwebsite']);
                $cphost = sanitize_text_field($_POST['cphost']);
                $image = $_FILES['cpfile'];
            
                // Validate file upload
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
            
                // Create the new podcast post
                $new_podcast = array(
                    'post_title'    => $cpname,
                    'post_content'  => $cpdescription,
                    'post_status'   => 'pending', // Or use 'Pending' if you want admin approval
                    'post_type'     => 'poadcast',
                );
            
                // Insert the post into the database
                $post_id = wp_insert_post($new_podcast);
                if (!is_wp_error($post_id)) {
                    // Add custom fields/meta for website and host
                    update_post_meta($post_id, 'podcast_website', $cpwebsite);
                    update_post_meta($post_id, 'podcast_host', $cphost);
            
                    if (isset($attachment_id)) {
                        set_post_thumbnail($post_id, $attachment_id);
                    }
            
                    // Send email to admin
                    $admin_email = 'avisekh.chowdhury@weavers-web.com';
                    $subject = 'New Podcast Submission';
                    $message = sprintf(
                        "A new podcast has been submitted:\n\nTitle: %s\nDescription: %s\nWebsite: %s\nHost: %s\n\nPlease review the submission.",
                        $cpname,
                        $cpdescription,
                        $cpwebsite,
                        $cphost
                    );
                    
                    wp_mail($admin_email, $subject, $message);
        
                    // Show success message
                    echo '<p class="success">Form Submitted Successfully</p>';
                }
                else {
                    echo '<p class="danger">Form is not Submitted Successfully</p>';
                }
            } 
        } 
        
        
        
?>
            <div class="row common-padd ">
                <div class="common-heading">
                    <div class="common-heading-text">
                        <h2 class="light-green-bg">Add New Podcast</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="add-new-poadcast-form">
                        <form action="" method="post" class="row" id="form_row" enctype="multipart/form-data">
                            <div class="col-lg-6 col-md-6 mb-4">
                              <label for="validationDefault01" class="form-label">Name of Podcast*</label>
                              <input type="text" name="cpname" class="form-control" id="validationDefault01" placeholder="Enter podcast name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-4">
                                <label for="validationDefault02" class="form-label">Podcast Website*</label>
                                <input type="text" name="cpwebsite" class="form-control" id="validationDefault02" placeholder="https://" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Description of Podcast</label>
                                <textarea name="cpdescription" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter brief description of podcast" required></textarea>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="validationDefault01" class="form-label">Host(s)</label>
                                <input type="text" name="cphost" class="form-control" id="Host" placeholder="Enter host’s name" required>
                            </div>
                            <div class="col-lg-12 mb-4 choose-file">
                                <label for="validationDefault01" class="form-label">Podcast Artwork</label>
                                <div class="art-work-file-choose">
                                    <input type="file" id="real-file" name="cpfile" hidden="hidden" />
                                    <button type="button" class="choose-btn" id="choose-btn" required>Choose file</button>
                                    <span id="custom-text">No file chosen</span>
                                </div>
                                <p>Accepted file types: JPEG,PNG. file size: 5 MB.</p>
                              </div>
                            <div class="col-12">
                              <button class="btn" type="submit">Submit Podcast for Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer() ; ?>


    <script>
document.getElementById("choose-btn").addEventListener("click", function() {
    document.getElementById("real-file").click();
});

document.getElementById("real-file").addEventListener("change", function() {
    const file = this.files[0];
    const customText = document.getElementById("custom-text");
    
    if (file) {
        customText.innerHTML = file.name;
    } else {
        customText.innerHTML = "No file chosen";
    }
});

function validateForm() {
    const cpwebsite = document.getElementById("validationDefault02").value;
    const cpfile = document.getElementById("real-file").files[0];
    
    // Validate website URL
    const urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
    if (!urlPattern.test(cpwebsite)) {
        alert("Please enter a valid URL.");
        return false;
    }

    // Validate file type and size
    if (cpfile) {
        const fileType = cpfile.type;
        const fileSize = cpfile.size;
        const validTypes = ["image/jpeg", "image/png"];
        const maxSize = 5 * 1024 * 1024; // 5 MB

        if (!validTypes.includes(fileType)) {
            alert("Only JPEG and PNG files are allowed.");
            return false;
        }

        if (fileSize > maxSize) {
            alert("File size exceeds 5 MB.");
            return false;
        }
    } else {
        alert("Please upload a podcast artwork.");
        return false;
    }

    return true;
}
</script>