<?php

namespace ArabiaIOClone\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use \Post;

/**
 * Description of PostPresenter
 *
 * @author Hichem MHAMED
 */
class PostPresenter extends BasePresenter 
{
    public function __construct(Post $post)
    {
        $this->resource = $post;
    }
    
    public function getCreationDateDiffForHumans()
    {
        return $this->resource->created_at->diffForHumans();
    }
    
    public function getRouteToPost()
    {
        return route('post-view',[
            'postId'=>$this->resource->id,
            'postSlug' => $this->resource->slug
                
                ]);
    }
    
    public function getRouteToCommunity()
    {
        return route('community-view',array('communitySlug'=>$this->resource->community()->slug));
    }
    
    public function getTitleHTMLTag()
    {
        if($this->resource->link)
        {
            $url = parse_url($this->resource->link);
            
            $url= "(".$url['host'].")";
        
            $result = "<a href='$this->resource->link' rel='nofollow' target='_blank'>";
            $result .= $this->resource->title;
            $result .= '</a>';
            $result .= "<span class='post_domain'>$url</span>";
            return $result;
        
        }else
        {
            $result = "<a href='".$this->getRouteToPost()."'>".$this->resource->title."</a>";
            return $result;
        }
    }
    
    public function getDivId()
    {
        return 'post-'.$this->resource->id;
    }
}

?>