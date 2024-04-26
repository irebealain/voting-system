let Photoes = ["Assets/cover.png","Assets/9V1A7817.jpg","Assets/P1370380.JPG"];
let dictionary = ["Vote for Students Representatives","Student government are known as enrolled scholars", "They represent the point of view of their peers"];
let head = document.getElementById("headings");
        let i = 0;
        function changePicF (){
            if (i < Photoes.length){
                head.textContent = dictionary[i];
                const slide = document.getElementById("images");
                slide.src = Photoes[i];
                
                i++;
            }
            else if (i >= Photoes.length - 1){
                i = 0;
            }
        }
        function changePicB (){
            if (i > 0){
                i--;
                const slide = document.getElementById("images");
                slide.src = Photoes[i];
            }
            setInterval(changePicF, 3000);
        }
        // let Photoes = ["Assets/cover.png", "Assets/9V1A7817.jpg", "Assets/P1370380.JPG"];
        // let dictionary = ["Vote for Students Representatives", "Student government are known as enrolled scholars", "They represent the point of view of their peers"];
        // let head = document.getElementById("headings");
        // let i = 0;
        
        // function updateSlide() {
        //     // Update the heading and image based on the current index i
        //     head.textContent = dictionary[i];
        //     const slide = document.getElementById("images");
        //     slide.src = Photoes[i];
        // }
        
        // function changePicF() {
        //     // Increment the index and loop back if necessary
        //     i = (i + 1) % Photoes.length;
        //     updateSlide();
        // }
        
        // function changePicB() {
        //     // Decrement the index and loop back if necessary
        //     i = (i - 1 + Photoes.length) % Photoes.length;
        //     updateSlide();
        // }
        
        // // Set an interval to automatically change the picture every 3 seconds
        // setInterval(changePicF, 3000);
        
        // // Add event listeners for forward and backward navigation (assuming you have buttons for these)
        // document.getElementById("next").addEventListener("click", changePicF);
        // document.getElementById("prev").addEventListener("click", changePicB);
        