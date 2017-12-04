<?php
/*
This module is for Infobahn event thema.
this code for chaking data from modules.
*/

//set image layout
switch($mod_settings['style_speaker']){
  case 'image-top':
    $layout = '-columnCommon';
    break;
  case 'image-left':
    $layout = '-sideCommon';
    break;
};
// set column
switch ($mod_settings['column']) {
    case 1:
        $column = '';
        break;
    case 2:
        $column = '-column2';
        break;
    case 3:
        $column = '-column3';
        break;
    case 4:
        $column = '-column4';
        break;
    case 5:
        $column = '-column5';
        break;
};
if($mod_settings['sp_column'] == "1 column"){
  $sp_column = ' -one_column';
}else{
  $sp_column = "";
};

//how many speaker
$speakers_setting = explode("|", $mod_settings['data']);

echo '<div class="sp-container '.$column.$sp_column.'">';
echo '<ul class="sp-list '.$layout.'">';


  // Access to spearker DB
  $posts = get_posts(array(
        'post_type' => 'speaker_themes',
        'numberposts' => -1)
      );

if($posts){
  foreach($posts as $post){
    $x = 0;
    while($x < count($speakers_setting)){

  //make var
  $dataImage = get_field("image", $post->ID);
  $dataNameJp = get_field("name_jp", $post->ID);
  $dataNameEn = get_field("name_en", $post->ID);

  $dataTitleJp = get_field("title_jp", $post->ID);
  $dataTitleEn = get_field("title_en", $post->ID);

  $dataCopyJp = get_field("copy_jp", $post->ID);
  $dataCopyEn = get_field("copy_en", $post->ID);

  $dataProJp = get_field("profile_jp", $post->ID, false);
  $dataProEn = get_field("profile_en", $post->ID, false);

  $dataLink = get_field("popup_link", $post->ID);

if($speakers_setting[$x] == $dataNameEn){
    echo '<li class="sp-list-item">';
    //set link
    if($mod_settings['popup'] == "popup"){
      if($dataLink != ""){
    echo '<div class="sp-list-itemInner" onclick="'.$dataLink.'">';
      }else{
    echo '<div class="sp-list-itemInner" onclick="javascript:void(0);">';
    };
  };

    echo '<p class="sp-list-itemFigure"><img src="'.$dataImage.'" alt="'.$dataNameJp.'" width="'.$mod_settings['img_width'].'"></p>';

    if($mod_settings['style_speaker']=='image-left'){
      echo '<div class="sp-list-itemBox" style="max-width: calc(100% - '.$mod_settings['img_width'].'px - 1em)">'; 
    }else{
      echo '<div class="sp-list-itemBox">';
    }

//make japanese text and english text
$japanese_text = explode("|", $mod_settings['jp_tx']);
$english_text = explode("|", $mod_settings['english_tx']);


//name
  echo '<p class="sp-list-itemBoxName"><strong>';
    if(in_array('japanese_tx_name', $japanese_text)){
    echo '<span class="sp-list-itemBoxNameJa">'.$dataNameJp.'</span>';
  }else{
    echo '<span class="sp-list-itemBoxNameJa -notext">'.$dataNameJp.'</span>';
  };
    if(in_array('english_tx_name', $english_text)){
    echo '<span class="sp-list-itemBoxNameUs">'.$dataNameEn.'</span>';
  }else{
    echo '<span class="sp-list-itemBoxNameUs -notext">'.$dataNameEn.'</span>';
  };
    echo '</strong></p>';

//title
  if($dataTitleJp != "" || $dataTitleEn != ""){
      echo '<p class="sp-list-itemBoxJob">';
      if($dataTitleJp != ""){
        if(in_array('japanese_tx_title', $japanese_text)){
        echo '<span class="sp-list-itemBoxJobJa">'.$dataTitleJp.'</span>';
      }else{
        echo '<span class="sp-list-itemBoxJobJa -notext">'.$dataTitleJp.'</span>';
      };
    };
    if($dataTitleEn != ""){
      if(in_array('english_tx_title', $english_text)){
      echo '<span class="sp-list-itemBoxJobUs">'.$dataTitleEn.'</span>';
    }else{
      echo '<span class="sp-list-itemBoxJobUs -notext">'.$dataTitleEn.'</span>';
    };
  };
      echo '</p>';
  };

//copy
  if($dataCopyJp != "" || $dataCopyEn != ""){
    echo '<p class="sp-list-itemBoxCopy">';
    if($dataCopyJp != ""){
    if(in_array('japanese_tx_copy', $japanese_text)){
    echo '<span class="sp-list-itemBoxCopyJa">'.$dataCopyJp.'</span>';
  }else{
    echo '<span class="sp-list-itemBoxCopyJa -notext">'.$dataCopyJp.'</span>';
  };
};
    if($dataCopyEn != ""){
    if(in_array('english_tx_copy', $english_text)){
    echo '<span class="sp-list-itemBoxCopyUs">'.$dataCopyEn.'</span>';
  }else{
    echo '<span class="sp-list-itemBoxCopyUs -notext">'.$dataCopyEn.'</span>';
  };
};
    echo '</p>';
  };


//profile
  if($dataProJp != "" || $dataProEn != ""){
    echo '<div class="sp-list-itemBoxLead">';
    if($dataProJp != ""){
    if(in_array('japanese_tx_profile', $japanese_text)){
    echo '<div class="sp-list-itemBoxLeadJa">'.$dataProJp.'</div>';
  }else{
  echo '<div class="sp-list-itemBoxLeadJa -notext">'.$dataProJp.'</div>';
};
};
    if($dataProEn != ""){

    if(in_array('english_tx_profile', $english_text)){
  echo '<div class="sp-list-itemBoxLeadUs">'.$dataProEn.'</div>';
}else{
  echo '<div class="sp-list-itemBoxLeadUs -notext">'.$dataProEn.'</div>';
};
};
    echo '</div><!-- //sp-list-itemBoxLead -->';
  };
    echo '</div><!-- //sp-list-itemBox -->';

  if($mod_settings['popup'] == "popup"){
    echo '</div>';
  };

    echo '</li>';
  };
    $x++;
  };
};
}
?>
</ul>
</div><!-- //sp-container -->
