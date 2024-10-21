import EmblaCarousel from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';

const carousel = document.getElementById('carousel');
const dots = document.getElementById('dots');

const emblaApi = EmblaCarousel(
    carousel,
    {
        align: 'start',
        loop: true,
        watchDrag: true,
        slidesToScroll: 'auto',
        containScroll: 'trimSnaps',
        breakpoints: {
            '(min-width: 768px)': {
                slidesToScroll: 2,
            },
        },
    },
    [
        Autoplay({
            stopOnInteraction: false,
        }),
    ]
);

const addDotBtnAndClickHandler = (emblaApi, dots) => {
    let dot = [];

    const addDotBtnWithClickHandler = () => {
        dots.innerHTML = emblaApi
            .scrollSnapList()
            .map(() => `
                <button type="button" class="inline-block h-2.5 min-w-[10px] w-full max-w-[10px] p-0 m-2 rounded-full bg-white/[0.60] outline-none transition-colors duration-300 ease-in-out dark:bg-black/[0.60]"></button>
            `)
            .join('');

        dot = Array.from(dots.getElementsByTagName('button'));
        dot.forEach((dotElement, index) => {
            dotElement.addEventListener(
                'click',
                () => emblaApi.scrollTo(index),
                false
            );
        });
    };

    const toggleDotBtnActive = () => {
        const previous = emblaApi.previousScrollSnap();
        const selected = emblaApi.selectedScrollSnap();
        dot[previous].classList.remove('!bg-white', 'dark:!bg-black');
        dot[selected].classList.add('!bg-white', 'dark:!bg-black');
    };

    emblaApi
        .on('init', addDotBtnWithClickHandler)
        .on('reInit', addDotBtnWithClickHandler)
        .on('init', toggleDotBtnActive)
        .on('reInit', toggleDotBtnActive)
        .on('select', toggleDotBtnActive);

    return () => {
        dots.innerHTML = '';
    };
};

const removeDotBtnAndClickHandler = addDotBtnAndClickHandler(
    emblaApi,
    dots
);

emblaApi.on('destroy', removeDotBtnAndClickHandler);
