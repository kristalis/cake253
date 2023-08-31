
var jsBookId = '';
var $process = 0;
var doRedirect = false;

let selectedScreenId = null;
let screenCountInSelectedScreen = null;

let imageContainer = $('#image_container .row');
let videoContainer = $('#video_container');
let fileUploadContainer = $('#file_upload_container');

let eachImgTagHtml = $('#each_image_container').html();
let eachVideoTagHtml = $('#each_video_container').html();
let eachFileInputHtml = $('#each_file_upload_container').html();

let noImgSrc = $('#no_image_src').val();

let currentStep = 0;
//flow
function triggerAddForm($process) {
  
    $('#steps-'+$process+' .step-1 .next-btn').click(function() {
        // validate form
        if (addFormValidate($process) == true) {
            
            $('#steps-'+$process+' .step-1').hide();            
            $('#steps-'+$process+' .step-2').show();

            let screenId= $('#steps-'+$process+' .step-1 #BookScreenCollectionId').val();
            createScreenHolder(screenId);
        }
    });

    
}
function addFormValidate($process) {
    if ($('#steps-'+$process+' #BookName').val() == '') {
        alert("Please enter a name for the book collection.");
        return false;
    } 
    else if ($('#steps-'+$process+' #BookScreenCollectionId').val() == null) {
        alert("Please Select Screen.");
        return false;
    } 
    else {
        return true;
    }
}

function createScreenHolder(screenId) {
       
    screenCountInSelectedScreen = screenCountPerScreen[screenId];

    let thisFind = [
        'video_name_placeholder',
        'video_label_placeholder',
        'video_id_placeholder',
        'image_name_placeholder',
        'image_id_placeholder',
    ];

    let currentNumberOfInputs = fileUploadContainer.find('.each_file').length;
    alert(currentNumberOfInputs);


    if(currentNumberOfInputs){
        if(currentNumberOfInputs > screenCountInSelectedScreen){
            let allFileInputContainer = fileUploadContainer.find('.each_file');
            let allImageTagContainer = imageContainer.find('.each_image');
            let allVideoTagContainer = videoContainer.find('.each_video');
            for(let i = currentNumberOfInputs - 1; i > screenCountInSelectedScreen - 1; i--){
                allFileInputContainer[i].remove();
                allImageTagContainer[i].remove();
                allVideoTagContainer[i].remove();
            }
            if(!imageContainer.find('.each_image.active').length) imageContainer.find('.each_image').eq(0).addClass('active');
            if(!$('.each_video.active').length) $('.each_video').eq(0).addClass('active');
            if(!$('.each_file.active').length) $('.each_file').eq(0).addClass('active');
        }
        else{
            for(let i = currentNumberOfInputs; i < screenCountInSelectedScreen; i++){
                imageContainer.append(eachImgTagHtml.replace('image_tag_id_placeholder', 'image_tag_'+i));
                videoContainer.append(eachVideoTagHtml.replace('video_tag_id_placeholder', 'video_tag_'+i));

                let thisReplaces = [
                    'video_file['+i+']',
                    'Upload video (mp4 only) - '+(i+1),
                    'video_file_'+i,
                    'image_file['+i+']',
                    'image_file_'+i,
                ];
                fileUploadContainer.append(eachFileInputHtml.replaceAllArray(thisFind, thisReplaces));
            }
        }
     }
     else{
        
         for(let i = 0; i < screenCountInSelectedScreen; i++){
             imageContainer.append(eachImgTagHtml.replace('image_tag_id_placeholder', 'image_tag_'+i));
             videoContainer.append(eachVideoTagHtml.replace('video_tag_id_placeholder', 'video_tag_'+i));

             let thisReplaces = [
                 'video_file['+i+']',
                 'Upload video (mp4 only) - '+(i+1),
                 'video_file_'+i,
                 'image_file['+i+']',
                 'image_file_'+i,
             ];
             fileUploadContainer.append(eachFileInputHtml.replaceAllArray(thisFind, thisReplaces));
         }
         imageContainer.find('.each_image').eq(0).addClass('active');
         $('.each_video').eq(0).addClass('active');
         $('.each_file').eq(0).addClass('active');
     }
 }



