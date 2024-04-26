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