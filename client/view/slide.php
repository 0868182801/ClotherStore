
<?php 
$size = mysqli_query($conn ,"SELECT * FROM slide ORDER BY slide_id DESC" );
?>
<main id="main" class="site-main">
        <div class="container">
            <section id="Slider">
                <div class="aspect-ratio-169">
                    <?php 
                        while($kq = mysqli_fetch_array($size)){
                    ?>
                    <img src="../../sever/uploading/<?php echo $kq['slide_img'] ?>" alt="">
                    <?php } ?>
                </div>
                <div class="dot-container">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
                <!-- <div class="slider-1"></div> -->
            </section>
            <script>
                const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
                const imgContainer = document.querySelector(".aspect-ratio-169")
                const dotItem = document.querySelectorAll(".dot")
            
            
                let index = 0
                let imgNumber = imgPosition.length
                // console.log(imgPosition)
            
            
                // 
                imgPosition.forEach(function(image,index){
                    image.style.left = index*100 + "%"
                    dotItem[index].addEventListener("click",function(){
                        slider(index)
                    })
                })
                function imgSlider(){
                    index++;
                    if(index >= imgNumber){
                        index = 0
                    }
                    slider(index)
                    // function slider(index){
                    // }
            
                }
                function slider(index){
                    imgContainer.style.left = "-" +index*100+ "%"
                    const dotActive = document.querySelector(".active")
                    dotActive.classList.remove("active")
                    dotItem[index].classList.add("active")
                }
                setInterval(imgSlider,2000)
            </script>
        </div>