<?php

namespace Allin\Video\Controller\Index;

class Video extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		//die('testdffdf');
	$i=0;
	//echo 'test video controller'; 
	$post = $this->getRequest()->getPost();
	$query = $post['searchVal'];
	//$post = $_POST['videocategory_id'];
	//echo $query; die;
	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
	$collection = $objectManager->create('Allin\Video\Model\Video')->getCollection();
	if($query!=''){
				$collection = $collection->addFieldToFilter('category_name', array('eq' =>$query))->addFieldToFilter('status', ['eq' => "0"]);
				  
			$storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
			$store = $storeManager->getStore();
			$mediaUrl = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
			$baseURL_l = $storeManager->getStore()->getBaseUrl();
				if (count($collection) > 0){
					foreach($collection as $video){
						$i++;
						$collection2 = $objectManager->create('Allin\VideoComment\Model\Videocomment')->getCollection()->addFieldToFilter('videos_id', array('eq' =>$video->getId()))->addFieldToFilter('status', ['eq' => "0"]);

						 ?>
						
						<div class="testt-<?php echo $video->getId(); ?>" id="videos">
							<iframe id="<?php echo $video->getId(); ?>" width="900" height="600" src="http://www.youtube.com/embed/<?php echo $video->getVideoUrl() ?>" style="display:none;"></iframe>
							<?php 
								$url = $video->getVideoTitle();
								$url = preg_replace('#[^0-9a-z]+#i', '-', $url);
								$url = strtolower($url);
							?>
							<?php $imge = 'https://img.youtube.com/vi/'.$video->getVideoUrl().' /0.jpg'?>
							<div id="videoimg" class="<?php echo $url; ?> first-<?php echo $i ?>" style="cursor:pointer">
							<a href="#<?php echo $url; ?>">
								<div class="sj-lft">
									<img src="https://img.youtube.com/vi/<?php echo $video->getVideoUrl() ?>/0.jpg"/>
									<div class="you-btn">
										<img src="http://119.82.68.254/headsupfourtails/pub/media/zipcode/youtube-play-button.png">
									</div>
								</div>
								<div class="sj-rhi"><h2 class="t1"> <?php echo $video->getVideoTitle() ?> </h2></div>
							</a>
							</div>
							<div id="video-desc" style="display:none">
							<div class="heading-share">
								<h2 class="size-26 bold title">Description</h2>
								<div id="videoshare">
									<div class="addthis_inline_share_toolbox" data-url="<?php echo $baseURL_l.'video#'.$url?>" data-title="<?php echo $video->getVideoTitle(); ?>" addthis:media="<?php echo 'https://img.youtube.com/vi/'.$video->getVideoUrl(); ?>/0.jpg" ></div>
								</div>
							</div>
							
							<?php echo $video->getDescription() ?>
								
								<ul id="authordata">
								<?php 
								$total = count($collection2);
								if (count($collection2) > 0){
									echo '<h2>Comments['. $total .']</h2>';
									foreach($collection2 as $col){ ?>
										<li>
											<div class="comment-author">
												<h4><?php echo $col->getUsername(); ?></h4> 		
											<p><?php echo $col->getComment(); ?></p>
											</div>
											<div id="replybtn"><span class="btnrply" id="btnrply-<?php echo $col->getVideocommentId(); ?>" vidId="<?php echo $col->getVideosId(); ?>" videocommentid="<?php echo $col->getVideocommentId(); ?>">Reply</span></div>
										</li>
								<?php	}}
								?>
								</ul>
							</div>
							
						</div>
						
	<?php 		}
		}
	}
			else{ 
			$storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
			$store = $storeManager->getStore();
			$mediaUrl = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
			$baseURL_l = $storeManager->getStore()->getBaseUrl();
				foreach($collection as $video){
						$i++;
						 $collection2 = $objectManager->create('Allin\VideoComment\Model\Videocomment')->getCollection()->addFieldToFilter('videos_id', array('eq' =>$video->getId()))->addFieldToFilter('status', ['eq' => "0"]);
						 
						 ?>
							<div class="testt-<?php echo $video->getId(); ?>" id="videos">
							<iframe id="<?php echo $video->getId(); ?>" width="900" height="600" src="http://www.youtube.com/embed/<?php echo $video->getVideoUrl() ?>" style="display:none;"></iframe>
							<?php 
								$url = $video->getVideoTitle();
								$url = preg_replace('#[^0-9a-z]+#i', '-', $url);
								$url = strtolower($url);
							?>
							<?php $imge = 'https://img.youtube.com/vi/'.$video->getVideoUrl().' /0.jpg'?>
							<div id="videoimg" class="<?php echo $url; ?> first-<?php echo $i ?>" style="cursor:pointer">
							<a href="#<?php echo $url; ?>">
								<div class="sj-lft">
									<img src="https://img.youtube.com/vi/<?php echo $video->getVideoUrl() ?>/0.jpg"/>
									<div class="you-btn">
										<img src="http://119.82.68.254/headsupfourtails/pub/media/zipcode/youtube-play-button.png">
									</div>
								</div>
								<div class="sj-rhi"><h2 class="t1"> <?php echo $video->getVideoTitle() ?> </h2></div>
							</a>
							</div>
							<div id="video-desc" style="display:none">
							<div class="heading-share">
								<h2 class="size-26 bold title">Description</h2>
								<div id="videoshare">
									<div class="addthis_inline_share_toolbox" data-url="<?php echo $baseURL_l.'video#'.$url?>" data-title="<?php echo $video->getVideoTitle(); ?>" addthis:media="<?php echo 'https://img.youtube.com/vi/'.$video->getVideoUrl(); ?>/0.jpg" ></div>
								</div>
							</div>
							<?php echo $video->getDescription() ?>
								<ul id="authordata">
								<?php 
								$total = count($collection2);
								if (count($collection2) > 0){
									echo '<h2>Comments['. $total .']</h2>';
									foreach($collection2 as $col){ ?>
										<li>
											<div class="comment-author">
												<h4><?php echo $col->getUsername(); ?></h4> 		
											</div>
											<p><?php echo $col->getComment(); ?></p>
											<div id="replybtn"><span class="btnrply" id="btnrply-<?php echo $col->getVideocommentId(); ?>" vidId="<?php echo $col->getVideosId(); ?>" videocommentid="<?php echo $col->getVideocommentId(); ?>">Reply</span></div>
										</li>
								<?php	}}
								?>
								</ul>
							</div>
							
						</div>
						
	<?php 		}
		}
    }
}