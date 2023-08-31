 
  <style>
    .each_video_upload_container .video_player_container video,
    .each_video_upload_container .image_container canvas{
        max-width: 100%;
    }
    .ui-accordion-link{
        display: none !important;
    }
    .ui-accordion-content.ui-widget-content{
        border: 0 none;
    }
    .validation_error{
        color: #c60;
        font-size: .8em;
        font-style: italic;
    }
    #image_container,
    #video_container,
    #final_image_space{
        margin-bottom: 10px;
    }
    #image_container .row,
    #final_image_space .row{
        display: flex;
        justify-content: center;
    }
    .each_video{
        border: 1px solid #777777;
        display: flex;
        align-items: center;
    }
    .each_video video {
        width: 100%;
        max-width: 100%;
        max-height: 350px;
    }
    .each_image{
        text-align: center;
        border: 1px solid #777777;
        display: flex;
        align-items: center;
        cursor: pointer;
        width: 150px;
        height: 150px;
    }
    .each_image img{
        max-width: 100%;
        max-height:100%;
    }
    .each_image.active,
    .each_image:hover{
        border-width: 2px;
        border-color: #003eff;
    }
    #final_image_space .each_image.active,
    #final_image_space .each_image:hover
    {
        border-width: 1px;
        border-color: #777777;
    }
    .each_file:not(.active),
    .each_video:not(.active)
    {
        display: none;
    }
    .custom_error{
        display: none;
        color: #c00;
        font-style: italic;
        text-align: center;
    }
    .listbox {
        height: 500px; /* adjust this value as needed */
        font-size: 16px; /* adjust this value as needed */
    }
</style> 
  
<script type="text/javascript" src="/js/jquery.datePicker.js"></script>
<script type="text/javascript" src="/js/date.js"></script>
<script type="text/javascript" src="/js/jquery.ui/ui.all.js"></script>
<script type="text/javascript" src="/js/book_collections/ajaxadd.js"></script>
<script type="text/javascript" src="/js/book_collections/add_book_collections.js"></script>
<script type="text/javascript" src="/js/book_collections/custom.js"></script>

  <div id="containerMain">
  <div id="steps">
  
  <div class="step-1">

<div class="baseBody">
<div class="baseLeftOffset"></div>
<div class="baseContainer">


<?php echo $this->Form->create('Book', array('id' => 'ClipAddForm')); ?>
<div class="bookadd_bookname">
    <div class="bookadd_bookname_input">
        <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'maxlength' => '50', 'after' => '<div id="bookNameError"></div>')); ?>
    </div>
</div>

<div class="bookadd_padding_y" style="height:7px;"></div>
<div class="linebreakBlock how-to-create" style="height:10px;">
    <div class="linebreak"></div>
</div>


<div class="book-type-tabs">

    <div class="bookadd_padding_y" style="height:17px;"></div>

    <div class="bookadd_category_label how-to-create">
        <div class="bookadd_labeltext" style="width:695px;">SELECT SCREEN</div>
    </div>
    

  
    <div class="bookadd_padding_y how-to-create" style="height:15px;"></div>
   
    <div class="panes">
    
        <div id="book-type-tabs-1">
            <div class="bookadd_backgrounds">
                <!-- select category -->
                <div class="bookadd_category_input">
                    <div class="bookadd_category">
                     
                        <!-- bookadd_category_label -->
                        <?php 
                            echo $this->Form->input('screen_collection_id', array(
                            'type' => 'select',
                            'options' => $screenCollections,
                            'empty' => '(Select a screen)',
                            'style' => 'height:180px',
                            'class' => 'pageRequired',
                            'size' => 10,
                            'label'=>false
                        ))?>

                  
                    </div>
 
                </div>
 

            </div>

 
        </div>
     
    </div>
    
</div>


<!-- linebreak -->
<div class="linebreakBlock" style="height:20px;">
<!-- baseBody -->
</div>

<div class="bookadd_navbuttonbar">
    <!-- navigation buttons -->
    <div class="bookadd_navbuttonbarbody">
        <div class="bookadd_navbuttonbar">
            <div class="baseButtonNav2">
                <div class="basePaddingNav_x"></div>
                <div class="basePaddingNav_y"></div>
                <div class="basePaddingNav_img">
                    <!-- back button -->
                
                    <!-- baseImgNavBack -->
                    <!-- spacer -->
                    <div class="basePaddingNav_3"></div>
                    <!-- cancel button -->
                    <div class="baseImgNavCancel">
                        <?php
                        $redirectUrlCancel = 'window.location=\'/books/index\'';
                        echo $this->Html->image('base_btn_navcancel_off.png', array('border' => 0,  'onlick' => $redirectUrlCancel, 'class' => 'cancel-btn')); ?>
                    </div>
                    <!-- baseImgNavCancel -->
                    <!-- spacer -->
                    <div class="basePaddingNav_3"></div>
                    <!-- next button -->
                    <div class="baseImgNavNext">
                        <?php echo $this->Html->image('base_btn_navnext_off.png', array('border' => 0,'class' => 'next-btn')); ?>
                    </div>
                    
            
                </div>
              
            </div>
           
        </div>
       
    </div>
    
</div>
 

</form>  
</div>
  
  
  
  <!-- //tanmay-->
  
  <div class="step-2" >
      <div class="baseBody">
          <div class="baseContainer">
          <div id ="image_container">
                <div class="row"></div>
            </div>
            <div id="video_file_not_selected_error" class="custom_error">
                Select video file (mp4) less than <?php echo ini_get('upload_max_filesize') ?> filesize
            </div>
            <div id="file_upload_container"></div>
            <div id="more_video_files_to_select" class="validation_error">
          </div>
      </div>
  
      <div class="bookadd_navbuttonbar">
          <!-- navigation buttons -->
          <div class="bookadd_navbuttonbarbody">
              <div class="bookadd_navbuttonbar">
                  <div class="baseButtonNav">
                      <div class="basePaddingNav_x"></div>
                      <div class="basePaddingNav_y"></div>
                      <div class="basePaddingNav_img">
                        
                          <div class="basePaddingNav_3"></div>
                          <!--  back button -->
                         <div class="baseImgNavBack">
                          <?php echo $this->Html->image('base_btn_navback_off.png', array('border' => 0, 'class' => 'back-btn')); ?>
                         </div>

                      <!-- cancel button -->
                          <div class="baseImgNavCancel">
                              <?php
                              $redirectUrlCancel = 'window.location=\'/books/index\'';
                              echo $this->Html->image('base_btn_navcancel_off.png', array('border' => 0, 'onlick' => $redirectUrlCancel, 'class' => 'cancel-btn')); ?>
                          </div>
                          <!-- baseImgNavCancel -->
                          <!-- spacer -->
                          <div class="basePaddingNav_3"></div>
                          <!-- next button -->
                          <div class="baseImgNavNext">
                              <?php echo $this->Html->image('base_btn_navnext_off.png', array('border' => 0,'class' => 'next-btn')); ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
       
      </div>
  </div>
  <div class="baseFooter"></div>
   
    
  <div class="step-3" >
  step 3 here
 </div>

 <div class="step-4"  >
 final setp 4 here
 </div>

 <div style="display: none" id="each_image_container">
    <div class="each_image">
        <?php echo $this->Html->image('no_image.jpg', array('fullBase' => true, 'id' => 'image_tag_id_placeholder')); ?>
    </div>
</div>
<div style="display: none" id="each_video_container">
    <div class="each_video">
        <video id="video_tag_id_placeholder" src="" controls></video>
    </div>
</div>
<div style="display: none" id="each_file_upload_container">
    <div class="each_file">
        <?php echo $this->Form->control('video_name_placeholder', array('label' => 'video_label_placeholder', 'type' => 'file', 'accept' => 'video/mp4', 'id' => 'video_id_placeholder', 'class' => 'video_input_field pageRequired', 'required' => true)); ?>
        <?php echo $this->Form->control('image_name_placeholder', array('type' => 'hidden', 'class' => 'thumbnail_input', 'id' => 'image_id_placeholder', 'type'=>'hidden', 'required' => false)); ?>
        Max upload size: <?php echo ini_get('upload_max_filesize') ?><br />
        <div class="custom_error"></div>
    </div>
</div>
<input type="hidden" id="no_image_src" value="/img/no_image.jpg"/>
<script>
   let screenCountPerScreen = <?php echo $screenCollectionsScreenCount ? json_encode($screenCollectionsScreenCount) : '{}'?>;
    let maxFileSizeInMB = '<?php echo ini_get('upload_max_filesize') ?>';
    let maxFileSizeInBytes = <?php echo intval(ini_get('upload_max_filesize'))*1024*1024 ?>;
    let supportedVideoTypes = ['video/mp4'];
</script>
