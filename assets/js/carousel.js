window.onload = () => {

    // DOM variables
    const carouselLeftBtn = document.getElementById('carousel-left-btn');
    const carouselRightBtn = document.getElementById('carousel-right-btn');
    const carouselSlides = document.querySelectorAll('#carousel-slide');

    // Save the number of the carousel into a variable
    const carouselSlidesNumber = carouselSlides.length;

    // Save number of the slide to display into a variable
    let slideNumber = 0;

    // Show only the first slide then document load
    carouselSlides.forEach((element, item) => {
        
        if (item > 0) {
            element.style.display = 'none';
        }

    })

    // Click right button event
    if (carouselRightBtn) {
        carouselRightBtn.addEventListener('click', () => {
                slideNumber++;
    
                carouselSlides.forEach((element, item) => {
                    
                    if (item === slideNumber) {
                        element.style.display = 'block';
                    } else {
                        element.style.display = 'none';
                    }
    
                    if ((slideNumber + 1) === carouselSlidesNumber) {
                        carouselRightBtn.style.display = 'none';
                    } else {
                        carouselRightBtn.style.display = 'block';
                    }
    
                    // Show the left btn if the slideNum is not equal to 0
                    if (slideNumber !== 0) {
                        carouselLeftBtn.style.display = 'block';
                    }
    
                })
    
        })
    }

    // Click left button event
    if (carouselLeftBtn) {
        carouselLeftBtn.addEventListener('click', () => {
            slideNumber--;
    
            carouselSlides.forEach((element, item) => {
                
                if (item === slideNumber) {
                    element.style.display = 'block';
                } else {
                    element.style.display = 'none';
                }
    
                if (slideNumber === 0) {
                    carouselLeftBtn.style.display = 'none';
                } else {
                    carouselLeftBtn.style.display = 'block';
                }
    
                // Show right button if it is not last image
                if ((slideNumber + 1) !== carouselSlidesNumber) {
                    carouselRightBtn.style.display = 'block';
                }
    
            })
    
        })
    }

}