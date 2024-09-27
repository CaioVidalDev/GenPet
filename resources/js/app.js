import './bootstrap';

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'

import flatpickr from "flatpickr";
import TomSelect from "tom-select";

window.TomSelect = TomSelect



document.addEventListener('alpine:init', () => {

    Alpine.data('mainState', () => {

        let lastScrollTop = 0

        const init = function () {

            window.addEventListener('scroll', () => {

                let st =
                    window.scrollY || document.documentElement.scrollTop

                if (st > lastScrollTop) {
                    // downscroll
                    this.scrollingDown = true
                    this.scrollingUp = false
                } else {
                    // upscroll
                    this.scrollingDown = false
                    this.scrollingUp = true
                    if (st == 0) {
                        //  reset
                        this.scrollingDown = false
                        this.scrollingUp = false
                    }
                }

                lastScrollTop = st <= 0 ? 0 : st // For Mobile or negative scrolling
            })

        }

        return {
            init,

            isSidebarOpen: window.innerWidth > 1024,
            isSidebarHovered: false,
            handleSidebarHover(value) {
                if (window.innerWidth < 1024) {
                    return
                }
                this.isSidebarHovered = value
            },
            handleWindowResize() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false
                } else {
                    this.isSidebarOpen = true
                }
            },
            
            scrollingDown: false,
            scrollingUp: false,
        }
    })
})