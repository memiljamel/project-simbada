import {
    Autocomplete,
    Collapse,
    Datepicker,
    Dropdown,
    initTE,
    Input,
    Lightbox,
    Offcanvas,
    PerfectScrollbar,
    Ripple,
    Select,
    Toast,
    Tooltip,
} from 'tw-elements';
import './autosize';
import './bootstrap';

/** Autocomplete Handler */
const autocompleteList = [].slice.call(
    document.querySelectorAll('[data-autocomplete]')
);

autocompleteList.map((autocompleteItem) => {
    return new Autocomplete(autocompleteItem, {
        autoSelect: true,
        container: 'body',
        customContent: '',
        debounce: 300,
        displayValue: (value) => value,
        filter: (value) => {
            const items = eval(autocompleteItem.dataset.autocompleteItems);

            return items.filter((item) => {
                return item.toLowerCase().startsWith(value.toLowerCase());
            });
        },
        itemContent: null,
        listHeight: 240,
        loaderCloseDelay: 300,
        noResults: 'No results found',
        threshold: 2,
    }, {
        autocompleteItem:
            "flex flex-row items-center justify-between w-full h-[48px] px-4 py-[0.4375rem] truncate text-black/[0.87] bg-transparent select-none cursor-pointer hover:[&:not([data-te-autocomplete-option-disabled])]:bg-black/[0.04] data-[te-autocomplete-item-active]:bg-black/[0.10] data-[data-te-autocomplete-option-disabled]:text-black/[0.38] data-[data-te-autocomplete-option-disabled]:cursor-default dark:text-white/[0.87] dark:hover:[&:not([data-te-autocomplete-option-disabled])]:bg-white/[0.04] dark:data-[te-autocomplete-item-active]:bg-white/[0.10]",
        autocompleteList:
            "list-none m-0 p-0 overflow-y-auto",
        autocompleteLoader:
            "absolute right-1 top-2 w-[1.4rem] h-[1.4rem] border-[0.15em]",
        dropdown:
            "relative outline-none min-w-[100px] m-0 scale-[0.8] opacity-0 bg-white shadow-[0_2px_5px_0_rgba(0,0,0,0.16),_0_2px_10px_0_rgba(0,0,0,0.12)] transition duration-200 motion-reduce:transition-none data-[te-autocomplete-state-open]:scale-100 data-[te-autocomplete-state-open]:opacity-100 dark:bg-charleston-green",
        dropdownContainer:
            "z-[0]",
        scrollbar:
            "[&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-button]:block [&::-webkit-scrollbar-button]:h-0 [&::-webkit-scrollbar-button]:bg-transparent [&::-webkit-scrollbar-track-piece]:bg-transparent [&::-webkit-scrollbar-track-piece]:rounded-none [&::-webkit-scrollbar-track-piece]: [&::-webkit-scrollbar-track-piece]:rounded-l [&::-webkit-scrollbar-thumb]:h-[50px] [&::-webkit-scrollbar-thumb]:bg-[#999] [&::-webkit-scrollbar-thumb]:rounded",
        spinnerIcon:
            "inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]",
    });
});

/** Datepicker Handler */
const datepickerList = [].slice.call(
    document.querySelectorAll('[data-te-datepicker-init]')
);

datepickerList.map((datepickerItem) => {
    return new Datepicker(datepickerItem, {
        cancelBtnLabel: 'Cancel selection',
        cancelBtnText: 'Cancel',
        changeMonthIconTemplate: `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        `,
        clearBtnLabel: 'Clear selection',
        clearBtnText: 'Clear',
        confirmDateOnSelect: false,
        container: 'body',
        disablePast: false,
        disableFuture: true,
        disableInput: false,
        disableToggleButton: false,
        filter: null,
        format: 'yyyy-mm-dd',
        inline: false,
        max: '-',
        min: '-',
        monthsFull: [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ],
        monthsShort: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ],
        nextMonthLabel: 'Next month',
        nextMultiYearLabel: 'Next 24 years',
        nextYearLabel: 'Next year',
        okBtnText: 'Ok',
        okBtnLabel: 'Confirm selection',
        prevMonthLabel: 'Previous month',
        prevMultiYearLabel: 'Previous 24 years',
        prevYearLabel: 'Previous year',
        removeCancelBtn: false,
        removeClearBtn: false,
        removeOkBtn: false,
        startDate: null,
        startDay: 0,
        switchToDayViewLabel: 'Choose date',
        switchToMonthViewLabel: 'Choose date',
        switchToMultiYearViewLabel: 'Choose year and month',
        title: 'Select date',
        view: 'days',
        viewChangeIconTemplate: `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        `,
        weekdaysFull: [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ],
        weekdaysNarrow: [
            'S',
            'M',
            'T',
            'W',
            'T',
            'F',
            'S',
        ],
        weekdaysShort: [
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat',
        ],
    }, {
        datepickerArrowControls:
            "mt-2.5",
        datepickerBackdrop:
            "w-full h-full fixed top-0 right-0 left-0 bottom-0 bg-black/40 z-[1065]",
        datepickerCell:
            "text-center data-[te-datepicker-cell-disabled]:text-neutral-300 data-[te-datepicker-cell-disabled]:cursor-default data-[te-datepicker-cell-disabled]:pointer-events-none data-[te-datepicker-cell-disabled]:hover:cursor-default hover:cursor-pointer group",
        datepickerCellContent:
            "mx-auto group-[:not([data-te-datepicker-cell-disabled]):not([data-te-datepicker-cell-selected]):hover]:bg-neutral-300 group-[[data-te-datepicker-cell-selected]]:bg-blue-500 group-[[data-te-datepicker-cell-selected]]:text-white group-[:not([data-te-datepicker-cell-selected])[data-te-datepicker-cell-focused]]:bg-neutral-100 group-[[data-te-datepicker-cell-focused]]:data-[te-datepicker-cell-selected]:bg-blue-500 group-[[data-te-datepicker-cell-current]]:border-solid group-[[data-te-datepicker-cell-current]]:border-black group-[[data-te-datepicker-cell-current]]:border dark:group-[:not([data-te-datepicker-cell-disabled]):not([data-te-datepicker-cell-selected]):hover]:bg-white/10 dark:group-[[data-te-datepicker-cell-current]]:border-white dark:group-[:not([data-te-datepicker-cell-selected])[data-te-datepicker-cell-focused]]:bg-white/10 dark:text-white dark:group-[[data-te-datepicker-cell-disabled]]:text-neutral-500",
        datepickerCellContentLarge:
            "w-[72px] h-10 leading-10 py-[1px] px-0.5 rounded-[999px]",
        datepickerCellContentSmall:
            "w-9 h-9 leading-9 rounded-[50%] text-[13px]",
        datepickerCellLarge:
            "w-[76px] h-[42px]",
        datepickerCellSmall:
            "w-10 h-10 xs:max-md:landscape:w-8 xs:max-md:landscape:h-8",
        datepickerClearBtn:
            "mr-auto",
        datepickerDate:
            "xs:max-md:landscape:mt-24 h-[72px] flex flex-col justify-end",
        datepickerDateText:
            "text-[34px] font-normal text-white",
        datepickerDateControls:
            "px-3 pt-2.5 pb-0 flex justify-between text-black/[64]",
        datepickerDayHeading:
            "w-10 h-10 text-center text-[12px] font-normal dark:text-white",
        datepickerFooter:
            "h-14 flex absolute w-full bottom-0 justify-end items-center px-3",
        datepickerDropdownContainer:
            "w-[328px] h-[380px] bg-white rounded-lg shadow-[0px_2px_15px_-3px_rgba(0,0,0,.07),_0px_10px_20px_-2px_rgba(0,0,0,.04)] z-[1066] dark:bg-zinc-700",
        datepickerFooterBtn:
            "outline-none bg-white text-blue-500 border-none cursor-pointer py-0 px-2.5 uppercase text-[0.8rem] leading-10 font-medium h-10 tracking-[.1rem] rounded-[10px] mb-2.5 hover:bg-neutral-200 focus:bg-neutral-200 dark:bg-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10",
        datepickerHeader:
            "xs:max-md:landscape:h-full h-[120px] px-6 bg-blue-500 flex flex-col rounded-t-lg dark:bg-zinc-800",
        datepickerNextButton:
            "p-0 w-10 h-10 leading-10 border-none outline-none m-0 text-gray-600 bg-transparent hover:bg-neutral-200 hover:rounded-[50%] focus:bg-neutral-200 focus:rounded-[50%] dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10 [&>svg]:w-4 [&>svg]:h-4 [&>svg]:rotate-180 [&>svg]:mx-auto",
        datepickerPreviousButton:
            "p-0 w-10 h-10 leading-10 border-none outline-none m-0 text-gray-600 bg-transparent mr-6 hover:bg-neutral-200 hover:rounded-[50%] focus:bg-neutral-200 focus:rounded-[50%] dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10 [&>svg]:w-4 [&>svg]:h-4 [&>svg]:mx-auto",
        datepickerTable:
            "mx-auto w-[304px]",
        datepickerTitle:
            "h-8 flex flex-col justify-end",
        datepickerTitleText:
            "text-[10px] font-normal uppercase tracking-[1.7px] text-white",
        datepickerToggleButton:
            "flex items-center justify-content-center [&>svg]:w-5 [&>svg]:h-5 absolute outline-none border-none bg-transparent right-0.5 top-1/2 -translate-x-1/2 -translate-y-1/2 hover:text-primary focus:text-primary dark:hover:text-primary-400 dark:focus:text-primary-400 dark:text-neutral-200",
        datepickerMain:
            "relative h-full",
        datepickerView:
            "outline-none px-3",
        datepickerViewChangeIcon:
            "inline-block pointer-events-none ml-[3px] [&>svg]:w-4 [&>svg]:h-4 [&>svg]:fill-neutral-500 dark:[&>svg]:fill-white",
        datepickerViewChangeButton:
            "flex items-center outline-none p-2.5 text-neutral-500 font-medium text-[0.9rem] rounded-xl shadow-none bg-transparent m-0 border-none hover:bg-neutral-200 focus:bg-neutral-200 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10",
        fadeIn:
            "animate-[fade-in_0.3s_both] px-[auto] motion-reduce:transition-none motion-reduce:animate-none",
        fadeInShort:
            "animate-[fade-in_0.15s_both] px-[auto] motion-reduce:transition-none motion-reduce:animate-none",
        fadeOut:
            "animate-[fade-out_0.3s_both] px-[auto] motion-reduce:transition-none motion-reduce:animate-none",
        fadeOutShort:
            "animate-[fade-out_0.15s_both] px-[auto] motion-reduce:transition-none motion-reduce:animate-none",
        modalContainer:
            "flex flex-col fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[328px] h-[512px] bg-white rounded-[0.6rem] shadow-lg z-[1066] xs:max-md:landscape:w-[475px] xs:max-md:landscape:h-[360px] xs:max-md:landscape:flex-row dark:bg-zinc-700",
    });
});

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
            "group/notch flex absolute left-0 top-0 w-full max-w-full h-full text-left pointer-events-none",
        notchLeading:
            "pointer-events-none border border-solid box-border bg-transparent transition-none duration-0 ease-linear motion-reduce:transition-none left-0 top-0 h-full w-2 border-r-0 rounded-l-[0.25rem] group-data-[te-input-focused]/notch:border-r-0 group-data-[te-input-state-active]/notch:border-r-0 peer-disabled:group-[]/notch:!opacity-60",
        notchLeadingNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]/notch:shadow-[-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary)] group-data-[te-input-focused]/notch:border-primary peer-focus:group-[]/notch:shadow-[-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary)] peer-focus:group-[]/notch:border-primary group-has-[.is-invalid]:group-data-[te-input-focused]/notch:shadow-[-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error)] group-has-[.is-invalid]:peer-focus:group-[]/notch:shadow-[-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error)] group-has-[.is-invalid]:!border-error",
        notchLeadingWhite:
            "border-neutral-200 group-data-[te-input-focused]/notch:shadow-[-1px_0_0_#ffffff,_0_1px_0_0_#ffffff,_0_-1px_0_0_#ffffff] group-data-[te-input-focused]/notch:border-white",
        notchMiddle:
            "pointer-events-none border border-solid box-border bg-transparent transition-none duration-0 ease-linear motion-reduce:transition-none grow-0 shrink-0 basis-auto w-auto max-w-[calc(100%-1rem)] h-full border-r-0 border-l-0 group-data-[te-input-focused]/notch:border-x-0 group-data-[te-input-state-active]/notch:border-x-0 group-data-[te-input-focused]/notch:border-t group-data-[te-input-state-active]/notch:border-t group-data-[te-input-focused]/notch:border-solid group-data-[te-input-state-active]/notch:border-solid group-data-[te-input-focused]/notch:!border-t-transparent group-data-[te-input-state-active]/notch:!border-t-transparent peer-focus:group-[]/notch:!border-t-transparent peer-active:group-[]/notch:!border-t-transparent peer-disabled:peer-[&:not([data-te-input-state-active])]:group-[]/notch:!border-t-black/[0.24] peer-disabled:group-[]/notch:!opacity-60",
        notchMiddleNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]/notch:shadow-[0_1px_0_0_theme(colors.primary)] group-data-[te-input-focused]/notch:border-primary peer-focus:group-[]/notch:shadow-[0_1px_0_0_theme(colors.primary)] peer-focus:group-[]/notch:border-primary group-has-[.is-invalid]:group-data-[te-input-focused]/notch:shadow-[0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:peer-focus:group-[]/notch:shadow-[0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:!border-error",
        notchMiddleWhite:
            "border-neutral-200 group-data-[te-input-focused]/notch:shadow-[0_1px_0_0_#ffffff] group-data-[te-input-focused]/notch:border-white",
        notchTrailing:
            "pointer-events-none border border-solid box-border bg-transparent transition-none duration-0 ease-linear motion-reduce:transition-none grow h-full border-l-0 rounded-r-[0.25rem] group-data-[te-input-focused]/notch:border-l-0 group-data-[te-input-state-active]/notch:border-l-0 peer-disabled:group-[]/notch:!opacity-60",
        notchTrailingNormal:
            "border-black/[0.24] dark:border-neutral-600 group-data-[te-input-focused]/notch:shadow-[1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary)] group-data-[te-input-focused]/notch:border-primary peer-focus:group-[]/notch:shadow-[1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary)] peer-focus:group-[]/notch:border-primary group-has-[.is-invalid]:group-data-[te-input-focused]/notch:shadow-[1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:peer-focus:group-[]/notch:shadow-[1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:!border-error",
        notchTrailingWhite:
            "border-neutral-200 group-data-[te-input-focused]/notch:shadow-[1px_0_0_#ffffff,_0_-1px_0_0_#ffffff,_0_1px_0_0_#ffffff] group-data-[te-input-focused]/notch:border-white",
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

/** Select Handler */
const selectList = [].slice.call(
    document.querySelectorAll('[data-te-select-init]')
);

selectList.map((selectItem) => {
    return new Select(selectItem, {
        selectAutoSelect: true,
        selectContainer: 'body',
        selectClearButton: false,
        disabled: false,
        selectDisplayedLabels: 5,
        selectFormWhite: false,
        multiple: false,
        selectOptionsSelectedLabel: 'options selected',
        selectOptionHeight: 48,
        selectAll: true,
        selectAllLabel: 'Select all',
        selectSearchPlaceholder: 'Search...',
        selectSize: 'default',
        selectVisibleOptions: 5,
        // selectFilter: false,
        selectFilterDebounce: 300,
        selectNoResultText: 'No results',
        selectValidation: false,
        selectValidFeedback: 'Valid',
        selectInvalidFeedback: 'Invalid',
        selectPlaceholder: '',
        customArrow: `
            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M7 10l5 5 5-5z" />
            </svg>
        `,
    }, {
        dropdown:
            "relative outline-none min-w-[100px] m-0 scale-[0.8] opacity-0 bg-white shadow-[0_2px_5px_0_rgba(0,0,0,0.16),_0_2px_10px_0_rgba(0,0,0,0.12)] transition duration-200 motion-reduce:transition-none data-[te-select-open]:scale-100 data-[te-select-open]:opacity-100 dark:bg-charleston-green",
        formCheckInput:
            "relative float-left ml-0 mr-2 mt-0.5 h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-black/[0.60] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-white/[0.60] dark:checked:border-primary dark:checked:bg-primary dark:checked:after:border-black dark:checked:focus:after:border-black dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)]",
        formOutline:
            "relative",
        initialized:
            "hidden",
        inputGroup:
            "flex items-center whitespace-nowrap p-2.5 text-center text-base font-normal leading-[1.6] text-gray-700 dark:bg-zinc-800 dark:text-gray-200 dark:placeholder:text-gray-200",
        noResult:
            "flex items-center px-4",
        optionsList:
            "list-none m-0 p-0",
        optionsWrapper:
            "overflow-y-auto",
        optionsWrapperScrollbar:
            "[&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-button]:block [&::-webkit-scrollbar-button]:h-0 [&::-webkit-scrollbar-button]:bg-transparent [&::-webkit-scrollbar-track-piece]:bg-transparent [&::-webkit-scrollbar-track-piece]:rounded-none [&::-webkit-scrollbar-track-piece]: [&::-webkit-scrollbar-track-piece]:rounded-l [&::-webkit-scrollbar-thumb]:h-[50px] [&::-webkit-scrollbar-thumb]:bg-[#999] [&::-webkit-scrollbar-thumb]:rounded",
        selectArrow:
            "block w-9 h-9 p-1.5 m-0 text-black/[0.60] rounded-full align-middle cursor-pointer outline-none transition duration-150 ease-in-out absolute right-1 !top-1/2 -translate-y-1/2 z-0 dark:text-white/[0.60] peer-disabled:opacity-70 peer-disabled:cursor-not-allowed peer-disabled:hover:!bg-transparent peer-disabled:active:!bg-transparent peer-disabled:focus:!bg-transparent",
        selectArrowWhite:
            "text-gray-50 peer-focus:!text-white peer-data-[te-input-focused]:!text-white",
        selectArrowDefault:
            "top-2",
        selectArrowLg:
            "top-[13px]",
        selectArrowSm:
            "top-1",
        selectClearBtn:
            "absolute top-2 right-9 text-black cursor-pointer focus:text-primary outline-none dark:text-gray-200",
        selectClearBtnWhite:
            "!text-gray-50",
        selectClearBtnDefault:
            "top-2 text-base",
        selectClearBtnLg:
            "top-[11px] text-base",
        selectClearBtnSm:
            "top-1 text-[0.8rem]",
        selectDropdownContainer:
            "z-[0]",
        selectFakeValue:
            "transform-none hidden data-[te-input-state-active]:block",
        selectFilterInput:
            "relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-gray-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition duration-300 ease-in-out motion-reduce:transition-none focus:border-primary focus:text-gray-700 focus:shadow-te-primary focus:outline-none dark:text-gray-200 dark:placeholder:text-gray-200",
        selectInput:
            "peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent pl-3 pr-11 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error",
        selectInputWhite:
            "!text-gray-50",
        selectInputSizeDefault:
            "p-0 m-0 leading-normal",
        selectInputSizeLg:
            "py-[0.32rem] px-3 leading-normal",
        selectInputSizeSm:
            "py-[0.33rem] px-3 text-xs leading-normal",
        selectLabel:
            "pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate text-black/[0.60] transition-all duration-200 ease-out peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:scale-[0.8] peer-data-[te-input-focused]:text-primary motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary data-[te-input-state-active]:scale-[0.8] group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error group-has-[.is-invalid]:peer-focus:!text-error group-has-[.is-invalid]:peer-data-[te-input-focused]:!text-error group-has-[.is-invalid]:dark:!text-error group-has-[.is-invalid]:dark:peer-focus:!text-error group-has-[.is-invalid]:dark:peer-data-[te-input-focused]:!text-error",
        selectLabelWhite:
            "!text-gray-50",
        selectLabelSizeDefault:
            "pt-3 leading-[1.6] peer-focus:-translate-y-[1.25rem] peer-data-[te-input-state-active]:-translate-y-[1.25rem] data-[te-input-state-active]:-translate-y-[1.25rem]",
        selectLabelSizeLg:
            "pt-[0.37rem] leading-[2.15] peer-focus:-translate-y-[1.15rem] peer-data-[te-input-state-active]:-translate-y-[1.15rem] data-[te-input-state-active]:-translate-y-[1.15rem]",
        selectLabelSizeSm:
            "pt-[0.37rem] text-xs leading-[1.5] peer-focus:-translate-y-[0.75rem] peer-data-[te-input-state-active]:-translate-y-[0.75rem] data-[te-input-state-active]:-translate-y-[0.75rem]",
        selectOption:
            "flex flex-row items-center justify-between w-full px-4 truncate text-black/[0.87] bg-transparent select-none cursor-pointer data-[te-input-multiple-active]:bg-black/[0.10] hover:[&:not([data-te-select-option-disabled])]:bg-black/[0.04] hover:data-[te-input-state-active]:!bg-black/[0.10] data-[te-input-state-active]:bg-black/[0.10] data-[te-select-option-selected]:data-[te-input-state-active]:bg-black/[0.10] data-[te-select-selected]:data-[te-select-option-disabled]:cursor-default data-[te-select-selected]:data-[te-select-option-disabled]:text-black/[0.38] data-[te-select-selected]:data-[te-select-option-disabled]:bg-transparent data-[te-select-option-selected]:bg-black/[0.10] data-[te-select-option-disabled]:text-black/[0.38] data-[te-select-option-disabled]:cursor-default group-data-[te-select-option-group-ref]/opt:pl-7 dark:text-white/[0.87] dark:hover:[&:not([data-te-select-option-disabled])]:bg-white/[0.04] dark:hover:data-[te-input-state-active]:!bg-white/[0.10] dark:data-[te-input-state-active]:bg-white/[0.10] dark:data-[te-select-option-selected]:data-[te-input-state-active]:bg-white/[0.10] dark:data-[te-select-option-disabled]:text-white/[0.38] dark:data-[te-input-multiple-active]:bg-white/[0.10]",
        selectAllOption:
            "",
        selectOptionGroup:
            "group/opt",
        selectOptionGroupLabel:
            "flex flex-row items-center w-full px-4 truncate bg-transparent text-black/50 select-none dark:text-gray-300",
        selectOptionIcon:
            "w-7 h-7 rounded-full",
        selectOptionSecondaryText:
            "block text-[0.8rem] text-gray-500 dark:text-gray-300",
        selectOptionText:
            "group",
        selectValidationValid:
            "hidden absolute -mt-3 w-auto text-sm text-green-600 cursor-pointer group-data-[te-was-validated]/validation:peer-valid:block",
        selectValidationInvalid:
            "hidden absolute -mt-3 w-auto text-sm text-[rgb(220,76,100)] cursor-pointer group-data-[te-was-validated]/validation:peer-invalid:block",

        /** Code below is input style */
        notch:
            "group/notch flex absolute left-0 top-0 w-full max-w-full h-full text-left pointer-events-none",
        notchLeading:
            "pointer-events-none border border-solid box-border bg-transparent transition-none duration-0 ease-linear motion-reduce:transition-none left-0 top-0 h-full w-2 border-r-0 rounded-l-[0.25rem] group-data-[te-input-focused]/notch:border-r-0 group-data-[te-input-state-active]/notch:border-r-0 peer-disabled:group-[]/notch:!opacity-60",
        notchLeadingNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]/notch:shadow-[-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary)] group-data-[te-input-focused]/notch:border-primary peer-data-[te-input-focused]:group-[]/notch:shadow-[-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary)] peer-data-[te-input-focused]:group-[]/notch:border-primary group-has-[.is-invalid]:group-data-[te-input-focused]/notch:shadow-[-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error)] group-has-[.is-invalid]:peer-data-[te-input-focused]:group-[]/notch:shadow-[-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error)] group-has-[.is-invalid]:!border-error",
        notchLeadingWhite:
            "border-neutral-200 group-data-[te-input-focused]/notch:shadow-[-1px_0_0_#ffffff,_0_1px_0_0_#ffffff,_0_-1px_0_0_#ffffff] group-data-[te-input-focused]/notch:border-white",
        notchMiddle:
            "pointer-events-none border border-solid box-border bg-transparent transition-none duration-0 ease-linear motion-reduce:transition-none grow-0 shrink-0 basis-auto w-auto max-w-[calc(100%-1rem)] h-full border-r-0 border-l-0 group-data-[te-input-focused]/notch:border-x-0 group-data-[te-input-state-active]/notch:border-x-0 group-data-[te-input-focused]/notch:border-t group-data-[te-input-state-active]/notch:border-t group-data-[te-input-focused]/notch:border-solid group-data-[te-input-state-active]/notch:border-solid group-data-[te-input-focused]/notch:!border-t-transparent group-data-[te-input-state-active]/notch:!border-t-transparent peer-data-[te-input-focused]:group-[]/notch:!border-t-transparent peer-active:group-[]/notch:!border-t-transparent peer-disabled:peer-[&:not([data-te-input-state-active])]:group-[]/notch:!border-t-black/[0.24] peer-disabled:group-[]/notch:!opacity-60",
        notchMiddleNormal:
            "border-black/[0.24] dark:border-white/[0.24] group-data-[te-input-focused]/notch:shadow-[0_1px_0_0_theme(colors.primary)] group-data-[te-input-focused]/notch:border-primary peer-data-[te-input-focused]:group-[]/notch:shadow-[0_1px_0_0_theme(colors.primary)] peer-data-[te-input-focused]:group-[]/notch:border-primary group-has-[.is-invalid]:group-data-[te-input-focused]/notch:shadow-[0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:peer-data-[te-input-focused]:group-[]/notch:shadow-[0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:!border-error",
        notchMiddleWhite:
            "border-neutral-200 group-data-[te-input-focused]/notch:shadow-[0_1px_0_0_#ffffff] group-data-[te-input-focused]/notch:border-white",
        notchTrailing:
            "pointer-events-none border border-solid box-border bg-transparent transition-none duration-0 ease-linear motion-reduce:transition-none grow h-full border-l-0 rounded-r-[0.25rem] group-data-[te-input-focused]/notch:border-l-0 group-data-[te-input-state-active]/notch:border-l-0 peer-disabled:group-[]/notch:!opacity-60",
        notchTrailingNormal:
            "border-black/[0.24] dark:border-neutral-600 group-data-[te-input-focused]/notch:shadow-[1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary)] group-data-[te-input-focused]/notch:border-primary peer-data-[te-input-focused]:group-[]/notch:shadow-[1px_0_0_theme(colors.primary),_0_-1px_0_0_theme(colors.primary),_0_1px_0_0_theme(colors.primary)] peer-data-[te-input-focused]:group-[]/notch:border-primary group-has-[.is-invalid]:group-data-[te-input-focused]/notch:shadow-[1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:peer-data-[te-input-focused]:group-[]/notch:shadow-[1px_0_0_theme(colors.error),_0_-1px_0_0_theme(colors.error),_0_1px_0_0_theme(colors.error)] group-has-[.is-invalid]:!border-error",
        notchTrailingWhite:
            "border-neutral-200 group-data-[te-input-focused]/notch:shadow-[1px_0_0_#ffffff,_0_-1px_0_0_#ffffff,_0_1px_0_0_#ffffff] group-data-[te-input-focused]/notch:border-white",
        counter:
            "text-right leading-[1.6]",
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
    Autocomplete,
    Collapse,
    Datepicker,
    Dropdown,
    Input,
    Lightbox,
    Offcanvas,
    PerfectScrollbar,
    Ripple,
    Select,
    Toast,
    Tooltip,
}, {
    allowReinits: true,
});
