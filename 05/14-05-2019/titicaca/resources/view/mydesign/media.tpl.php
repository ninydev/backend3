<?php
$media[0]['head'] = 'Show must go on!';
$media[0]['img'] = 'image/409026392.webp';
$media[0]['img_title'] = 'Show must go on!';
$media[0]['url'] = 'https://en.lyrsense.com/queen/the_show_must_go_on';
$media[0]['content'] = 'Empty spaces - what are we living for? Abandoned places - I guess we know the score.. On and on! Does anybody know what we are looking for?';

$media[1]['head'] = 'Scandal';
$media[1]['img'] = 'image/430424012.webp';
$media[1]['img_title'] = 'Scandal';
$media[1]['url'] = 'https://en.lyrsense.com/queen/scandal';
$media[1]['content'] = "Scandal - now you've left me all the world's gonna know Scandal, they're gonna turn our lives into a freak show, They'll see the heart-ache, they'll see our love break, They'll hear me pleading, I'll say for Gods sake, Over and over and over again";

$media[2]['head'] = 'Show must go on!';
$media[2]['img'] = 'image/409026392.webp';
$media[2]['img_title'] = 'Show must go on!';
$media[2]['url'] = 'https://en.lyrsense.com/queen/the_show_must_go_on';
$media[2]['content'] = 'Empty spaces - what are we living for? Abandoned places - I guess we know the score.. On and on! Does anybody know what we are looking for?';

$media[3]['head'] = 'Scandal';
$media[3]['img'] = 'image/430424012.webp';
$media[3]['img_title'] = 'Scandal';
$media[3]['url'] = 'https://en.lyrsense.com/queen/scandal';
$media[3]['content'] = "Scandal - now you've left me all the world's gonna know Scandal, they're gonna turn our lives into a freak show, They'll see the heart-ache, they'll see our love break, They'll hear me pleading, I'll say for Gods sake, Over and over and over again";

function checVar($arr, $key)
{
    if(isset($arr[$key]))
        return $arr[$key];
    else
        return '';
}

$media_cont='<article class="col-9 info">';
for ($i=0; $i < 4; $i++) { 
    $media_cont .='
    
    <div class="media">
        <img class="align-self-start mr-3" src="'. checVar($media[$i],'img'). '" title="'.checVar($media[$i],'img_title').'">
        <div class="media-body">
            <h5 class="mt-0"><a href="'.checVar($media[$i],'url').'">'. checVar($media[$i],'head').'</a></h5>
                <p>'.checVar($media[$i],'content').'</p>
        </div>
    </div>';
}
$media_cont.='</article>';
echo $media_cont;
?>
