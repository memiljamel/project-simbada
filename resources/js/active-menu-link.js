import ActiveMenuLink from 'active-menu-link';

new ActiveMenuLink('#nav-menu', {
    activeClass: 'active',
    scrollDuration: 50,
    headerHeight: window.innerWidth >= 1024 ? 64 : 56,
    default: null,
});
