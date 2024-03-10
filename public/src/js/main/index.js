let video = document.querySelector(".video")
let video_button = document.querySelector(".index__video__button")

video_button.addEventListener("click", handleVideo)
video.addEventListener("click", handleVideo)

function handleVideo() {
    if (video.paused) {
        video.play()
        video_button.innerHTML = svgPlay
    }else{
        video.pause()
        video_button.innerHTML = svgPause
    }
}

const header = document.querySelector('.header');
header.classList.add('header--video');


document.addEventListener('scroll', () =>
{
    if (window.scrollY > 0) {
        header.classList.remove('header--video');
    } else {
        header.classList.add('header--video');
    }
})

const svgPlay = '<path d="M21.7437 39.0163V9.98375C21.7437 7.2275 20.58 6.125 17.64 6.125H10.2288C7.28875 6.125 6.125 7.2275 6.125 9.98375V39.0163C6.125 41.7725 7.28875 42.875 10.2288 42.875H17.64C20.58 42.875 21.7437 41.7725 21.7437 39.0163Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/> <path d="M42.8766 39.0163V9.98375C42.8766 7.2275 41.7128 6.125 38.7728 6.125H31.3616C28.442 6.125 27.2578 7.2275 27.2578 9.98375V39.0163C27.2578 41.7725 28.4216 42.875 31.3616 42.875H38.7728C41.7128 42.875 42.8766 41.7725 42.8766 39.0163Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>'

const svgPause = '<path d="M8.16797 24.4999V17.2316C8.16797 8.20743 14.5584 4.51201 22.378 9.0241L28.6867 12.6583L34.9955 16.2924C42.815 20.8045 42.815 28.1953 34.9955 32.7074L28.6867 36.3416L22.378 39.9758C14.5584 44.4878 8.16797 40.7924 8.16797 31.7683V24.4999Z" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>'
