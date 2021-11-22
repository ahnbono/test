<?
include_once $_SERVER['DOCUMENT_ROOT']."/include/include_top.php";
?>
<script>

$(document).ready(function(){
	$('.rolling_wrap').bxSlider({ // 클래스명 주의!

		auto: true, // 자동으로 애니메이션 시작

		speed: 1000,  // 애니메이션 속도

		pause: 5000,  // 애니메이션 유지 시간 (1000은 1초)

		mode: 'horizontal', // 슬라이드 모드 ('fade', 'horizontal', 'vertical' 이 있음)
				
		controls: true,

		autoControls: false, // 시작 및 중지버튼 보여짐

		pager: false // 페이지 표시 보여짐
		

	});

	
});	

function login(){
alert("로그인을 해주세요.");
location.href="/member/login2.php";
}
      
</script>
<style>
.rolling_wrap{width:100%;max-height:560px;}
</style>


        <div class="container_wrap">        
        <!--메인상단-->
        <section class="main_img"> 	
        	<div class="main_img1">
           <?php
				$sql="select * from banner_main1";
				$result = mysqli_query($conn, $sql);
				for ($i=0; $row=mysqli_fetch_array($result); $i++) {
				
			?>
				<a href="<?php echo $row['link'] ; ?>" <?php if($row['target']!=""){echo "target='_blank'";} ; ?>>
					<img src="/adm/banner/<?php echo $row['filename1']?>" alt="">
				</a>
			<?php
				}	
			?>
			</div>
            
        	<div class="main_img2">
             <?php
				$sql="select * from banner_main2";
				$result = mysqli_query($conn, $sql);
				for ($i=0; $row=mysqli_fetch_array($result); $i++) {
				
			?>
				<a href="<?php echo $row['link'] ; ?>" <?php if($row['target']!=""){echo "target='_blank'";} ; ?>>
					<img src="/adm/banner/<?php echo $row['filename1']?>" alt="">
				</a>
			<?php
				}	
			?>
			</div>
        </section>        
        </div>
        
        <div class="divClear"></div>
        <div class="container_full">  
        <!--메인 이벤트 배너-->
        <section class="main_event_bn">
    		<div class="con_wrap">
        	<h2 class="h2_mainTT">BEST PICK<span>화병몰 에서 추천하는 상품입니다.</span></h2>
            <div class="main_event_box">
				<ul class="rolling_wrap">
					<?php
						$sql="select * from banner_main";
						$result = mysqli_query($conn, $sql);
						for ($i=0; $row=mysqli_fetch_array($result); $i++) {
						
					?>
						<li>
							<a href="<?php echo $row['link'] ; ?>" <?php if($row['target']!=""){echo "target='_blank'";} ; ?>>
								<img src="/adm/banner/<?php echo $row['filename1']?>" alt="">
							</a>
						</li>
					<?php
						}	
					?>
				</ul>	
			</div>
            
            </div>
        </section>      
        </div>
		<div class="container_wrap" >  
        <!--신상품 이벤트 배너-->
        <section class="con_wrap pdt_50">
			<h2 class="h2_mainTT">BSET<span>화병몰 베스트상품입니다.</span></h2>
            <div class="prdList grid3">
            	<ul>
					<?php
						$sql="select * from product where it_best=1 order by sort_num asc";
						$result = mysqli_query($conn, $sql);
						for ($i=0; $row=mysqli_fetch_array($result); $i++) {
							if($i<6){
					?>
                	<?php if($row['soldout']!=1){
									 
					?>
										<li>
											<div class="thumbnail">
											<a href="/shop/detail.php?pcode=<?php echo $row['pcode']?>">
												<div class="prdImg"><img src="/adm/img/<?php echo $row['filename1']?>" alt=""></div>
												<div class="prdInfo">
													<p class="name"><?php echo $row['pname']?></p>
													
													<p class="cost"><?php echo number_format($row['saleprice']) ?>원</p>
													<p class="opt">
													<span>
													<?php if($row['sc_type']=="1")  echo "무료배송"; ?>
													<?php if($row['sc_type']=="2")  echo "조건부 무료배송"; ?>
													<?php if($row['sc_type']=="3")  echo "유료배송"; ?>
													<?php if($row['sc_type']=="4")  echo "수량별 부과"; ?>
													</span> </p>
												</div>
											</a>
											</div>
										</li>
						
					<?php
									
						}else{ ?>
					<li>
						<div class="thumbnail">
							<div style="width: 100%; height: 100%; text-align: center;position: absolute;font-size: 171px;font-weight: bold;color: #fff;background:rgba(0,0,0,0.6);">품절</div>
                        	<div class="prdImg"><img src="/adm/img/<?php echo $row['filename1']?>" alt=""></div>
                            <div class="prdInfo">
                            	<p class="name"><?php echo $row['pname']?></p>
								
                                <p class="cost"><?php echo number_format($row['saleprice']) ?>원</p>
                               
								<p class="opt">
								<span>
								<?php if($row['sc_type']=="1")  echo "무료배송"; ?>
								<?php if($row['sc_type']=="2")  echo "조건부 무료배송"; ?>
								<?php if($row['sc_type']=="3")  echo "유료배송"; ?>
								<?php if($row['sc_type']=="4")  echo "수량별 부과"; ?>
								</span> <span></span></p>
                            </div>
                        </div>
					</li>

					<?php 
					}
							}
					}
					?>
           
                </ul>
            </div>
			          
        </section>      
		</div>
        
        <div class="container_wrap">  
        <!--메인 이벤트 배너-->
        <section class="con_wrap pdt_50">
        	<h2 class="h2_mainTT">NEW <span>화병몰  신상품입니다.</span></h2>
            <div class="prdList grid3">
            	<ul>
					<?php
						$sql="select * from product where it_main=1 order by sort_num asc";
						$result = mysqli_query($conn, $sql);
						for ($i=0; $row=mysqli_fetch_array($result); $i++) {
							if($i<6){
					?>
                	
						<?php if($row['soldout']!=1){
									
						?>
										<li>
											<div class="thumbnail">
											<a href="/shop/detail.php?pcode=<?php echo $row['pcode']?>">
												<div class="prdImg"><img src="/adm/img/<?php echo $row['filename1']?>" alt=""></div>
												<div class="prdInfo">
													<p class="name"><?php echo $row['pname']?></p>
													
													<p class="cost"><?php echo number_format($row['saleprice']) ?>원</p>
													<p class="opt">
													<span>
													<?php if($row['sc_type']=="1")  echo "무료배송"; ?>
													<?php if($row['sc_type']=="2")  echo "조건부 무료배송"; ?>
													<?php if($row['sc_type']=="3")  echo "유료배송"; ?>
													<?php if($row['sc_type']=="4")  echo "수량별 부과"; ?>
													</span> </p>
												</div>
											</a>
											</div>
										</li>

					<?php
									
						}else{ 
					?>
					<li>
						<div class="thumbnail">
							<div style="width: 100%; height: 100%; text-align: center;position: absolute;font-size: 171px;font-weight: bold;color: #fff;background:rgba(0,0,0,0.6);">품절</div>
                        	<div class="prdImg"><img src="/adm/img/<?php echo $row['filename1']?>" alt=""></div>
                            <div class="prdInfo">
                            	<p class="name"><?php echo $row['pname']?></p>
								
                                <p class="cost"><?php echo number_format($row['saleprice']) ?>원</p>
                          
								<p class="opt">
								<span>
								<?php if($row['sc_type']=="1")  echo "무료배송"; ?>
								<?php if($row['sc_type']=="2")  echo "조건부 무료배송"; ?>
								<?php if($row['sc_type']=="3")  echo "유료배송"; ?>
								<?php if($row['sc_type']=="4")  echo "수량별 부과"; ?>
								</span> <span></span></p>
                            </div>
                        </div>
					</li>

					<?php 
					}
							}
					}
					?>
           
                </ul>
            </div>
        </section>      
        </div>
        
        <div class="container_full">  
        <!--메인 이벤트 배너-->
        <section class="main_event2_bn">
    		<div class="con_wrap">
        	<h2 class="main_event2_tt">대량구매환영!</h2>
            <p>화병몰 에서는 대량구매를 환영합니다. 고객센터로 문의해주세요.</p>
            </div>
        </section>      
        </div>
        
        
        
        
<?
include_once $_SERVER['DOCUMENT_ROOT']."/include/include_footer.php";
?>
	