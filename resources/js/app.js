import {
    Dropdown,
    initTE,
    Input,
    Offcanvas,
    PerfectScrollbar,
    Ripple,
    Toast,
    Tooltip,
} from 'tw-elements';
import './autosize';
import './bootstrap';

/** Dropdown Handler */
const dropdownList = [].slice.call(
    document.querySelectorAll('[data-te-dropdown-toggle-ref]')
);

dropdownList.map((dropdownItem) => {
    return new Dropdown(dropdownItem, {
        offset: [0, 2],
        boundary: 'clippingParents',
        reference: 'toggle',
        display: 'dynamic',
        popperConfig: {
            strategy: 'fixed',
        },
        autoClose: true,
        dropdownAnimation: 'off',
        animationDuration: 550,
    });
});

/** Input Handler */
const inputList = [].slice.call(
    document.querySelectorAll('[data-te-input-wrapper-init]')
);

inputList.map((inputItem) => {
    return new Input(inputItem, {
        inputFormWhite: false,
    }, {
        notch:
            "group flex w-full max-w-full h-full text-left select-none pointer-events-none absolute transition-all top-0 after:content[''] after:block after:w-full after:absolute after:bottom-0 left-0 after:border-b-2 after:transition-transform after:duration-300 after:scale-x-0 after:border-primary peer-focus:after:scale-x-100 peer-focus:after:border-primary peer-data-[te-input-focused]:after:scale-x-100 peer-data-[te-input-focused]:after:border-primary group-data-[te-validation-state='invalid']:after:!border-error peer-[.is-invalid]:after:!border-error peer-[.is-invalid]:peer-focus:after:!border-error peer-[.is-invalid]:peer-data-[te-input-focused]:after:!border-error",
        notchLeading:
            "pointer-events-none border-b border-solid box-border bg-transparent transition-none duration-0 left-0 top-0 h-full w-0 border-r-0 rounded-l-none group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 peer-disabled:group-[]:border-dotted",
        notchLeadingNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]:shadow-none group-data-[te-input-focused]:border-black/[0.24] dark:group-data-[te-input-focused]:border-white/[0.24] group-has-[.is-invalid]:!border-error group-has-[.is-invalid]:dark:!border-error",
        notchLeadingWhite:
            "border-neutral-200 group-data-[te-input-focused]:shadow-[-1px_0_0_#ffffff,_0_1px_0_0_#ffffff,_0_-1px_0_0_#ffffff] group-data-[te-input-focused]:border-white",
        notchMiddle:
            "pointer-events-none border-b border-solid box-border bg-transparent transition-none duration-0 grow-0 shrink-0 basis-auto w-auto max-w-[calc(100%-1rem)] h-full border-r-0 border-l-0 group-data-[te-input-focused]:border-x-0 group-data-[te-input-state-active]:border-x-0 group-data-[te-input-focused]:border-t-0 group-data-[te-input-state-active]:border-t-0 group-data-[te-input-focused]:border-solid group-data-[te-input-state-active]:border-solid group-data-[te-input-focused]:border-t-transparent group-data-[te-input-state-active]:border-t-transparent peer-disabled:group-[]:border-dotted",
        notchMiddleNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]:shadow-none group-data-[te-input-focused]:border-black/[0.24] dark:group-data-[te-input-focused]:border-white/[0.24] group-has-[.is-invalid]:!border-error group-has-[.is-invalid]:dark:!border-error",
        notchMiddleWhite:
            "border-neutral-200 group-data-[te-input-focused]:shadow-[0_1px_0_0_#ffffff] group-data-[te-input-focused]:border-white",
        notchTrailing:
            "pointer-events-none border-b border-solid box-border bg-transparent transition-none duration-0 grow h-full border-l-0 rounded-r-none group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 peer-disabled:group-[]:border-dotted",
        notchTrailingNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]:shadow-none group-data-[te-input-focused]:border-black/[0.24] dark:group-data-[te-input-focused]:border-white/[0.24] group-has-[.is-invalid]:!border-error group-has-[.is-invalid]:dark:!border-error",
        notchTrailingWhite:
            "border-neutral-200 group-data-[te-input-focused]:shadow-[1px_0_0_#ffffff,_0_-1px_0_0_#ffffff,_0_1px_0_0_#ffffff] group-data-[te-input-focused]:border-white",
        counter:
            "text-right leading-[1.6]",
    });
});

/** Offcanvas */
const offcanvasList = [].slice.call(
    document.querySelectorAll('[data-te-offcanvas-init]')
);

offcanvasList.map((offcanvasItem) => {
    return new Offcanvas(offcanvasItem, {
        backdrop: true,
        keyboard: true,
        scroll: false,
    });
});

/** PerfectScrollbar Handler */
const perfectScrollbarList = [].slice.call(
    document.querySelectorAll('[data-te-perfect-scrollbar-init]')
);

perfectScrollbarList.map((perfectScrollbarItem) => {
    return new PerfectScrollbar(perfectScrollbarItem, {
        handlers: [
            'click-rail',
            'drag-thumb',
            'keyboard',
            'wheel',
            'touch',
        ],
        wheelSpeed: 1,
        // wheelPropagation: true,
        swipeEasing: true,
        minScrollbarLength: null,
        maxScrollbarLength: null,
        scrollingThreshold: 1000,
        useBothWheelAxes: false,
        suppressScrollX: false,
        suppressScrollY: false,
        scrollXMarginOffset: 0,
        scrollYMarginOffset: 0,
        positionRight: true,
    }, {
        ps:
            "group/ps overflow-hidden [overflow-anchor:none] touch-none",
        railX:
            "group/x absolute bottom-0 h-2.5 hidden opacity-0 transition-[background-color,_opacity] duration-200 ease-linear motion-reduce:transition-none z-0 group-[&.ps--active-x]/ps:block group-hover/ps:opacity-60 group-focus/ps:opacity-60 group-[&.ps--scrolling-x]/ps:opacity-60 hover:!opacity-90 focus:!opacity-90 [&.ps--clicking]:!opacity-90 outline-none",
        railXColors:
            "group-[&.ps--active-x]/ps:bg-transparent hover:!bg-[#eee] focus:!bg-[#eee] [&.ps--clicking]:!bg-[#eee] dark:hover:!bg-[#555] dark:focus:!bg-[#555] dark:[&.ps--clicking]:!bg-[#555]",
        railXThumb:
            "absolute bottom-0.5 rounded-md h-1.5 group-focus/ps:opacity-100 group-active/ps:opacity-100 [transition:background-color_.2s_linear,_height_.2s_ease-in-out] group-hover/x:h-1.5 group-focus/x:h-1.5 group-[&.ps--clicking]/x:bg-[#999] group-[&.ps--clicking]/x:h-1.5 outline-none",
        railXThumbColors:
            "bg-[#aaa] group-hover/x:bg-[#999] group-focus/x:bg-[#999]",
        railY:
            "group/y absolute right-0 w-2.5 hidden opacity-0 transition-[background-color,_opacity] duration-200 ease-linear motion-reduce:transition-none z-0 group-[&.ps--active-y]/ps:block group-hover/ps:opacity-60 group-focus/ps:opacity-60 group-[&.ps--scrolling-y]/ps:opacity-60 hover:!opacity-90 focus:!opacity-90 [&.ps--clicking]:!opacity-90 outline-none",
        railYColors:
            "group-[&.ps--active-y]/ps:bg-transparent hover:!bg-[#eee] focus:!bg-[#eee] [&.ps--clicking]:!bg-[#eee] dark:hover:!bg-[#555] dark:focus:!bg-[#555] dark:[&.ps--clicking]:!bg-[#555]",
        railYThumb:
            "absolute right-0.5 rounded-md w-1.5 group-focus/ps:opacity-100 group-active/ps:opacity-100 [transition:background-color_.2s_linear,_width_.2s_ease-in-out,_opacity] group-hover/y:w-1.5 group-focus/y:w-1.5 group-[&.ps--clicking]/y:w-1.5 outline-none",
        railYThumbColors:
            "bg-[#aaa] group-hover/y:bg-[#999] group-focus/y:bg-[#999] group-[&.ps--clicking]/y:bg-[#999]",
    });
});

/** Toast Handler */
const toastList = [].slice.call(
    document.querySelectorAll('[data-te-toast-init]')
);

toastList.map((toastItem) => {
    new Toast(toastItem, {
        width: null,
        position: 'bottom-center',
        offset: 32,
        container: '-',
        autohide: true,
        animation: true,
        delay: 2800,
        appendToBody: false,
        stacking: true,
    }, {
        fadeIn:
            'animate-[fade-in_0.3s_both] p-[auto] motion-reduce:transition-none motion-reduce:animate-none',
        fadeOut:
            'animate-[fade-out_0.3s_both] p-[auto] motion-reduce:transition-none motion-reduce:animate-none',
    });

    Toast.getInstance(toastItem).show();
});

/** Tooltip Handler */
const tooltipList = [].slice.call(
    document.querySelectorAll('[data-te-toggle="tooltip"]')
);

tooltipList.map((tooltipItem) => {
    return new Tooltip(tooltipItem, {
        animation: true,
        template: `
            <div class="z-30" role="tooltip">
                <div class="tooltip-inner inline-block bg-dark-charcoal text-white font-medium rounded caption min-h-[14px] px-2 py-1 dark:bg-lotion dark:text-black"></div>
            </div>
        `,
        trigger: 'hover focus',
        title: '',
        delay: 200,
        html: false,
        selector: false,
        placement: 'bottom',
        offset: ({placement, reference, popper}) => {
            if (placement === 'bottom') {
                return [0, 0];
            } else {
                return [0, 8];
            }
        },
        container: false,
        fallbackPlacements: [
            'top',
            'right',
            'bottom',
            'left',
        ],
        boundary: 'window',
        customClass: '',
        sanitize: true,
        sanitizeFn: null,
        popperConfig: {
            hide: true,
        },
    });
});

initTE({
    Dropdown,
    Input,
    Offcanvas,
    PerfectScrollbar,
    Ripple,
    Toast,
    Tooltip,
}, {
    allowReinits: true,
});
