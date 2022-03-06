/**
 * Utility script to open, close, or toggle elements using attributes.
 *
 * Ie:
 * Set data-closes="<selector>" on an element. When that element is clicked, all elements matching the selector have
 * their display set to hidden.
 */
export default function initDisplaySwitches () {
    let closeSwitches = document.querySelectorAll('*[data-closes]')
    closeSwitches.forEach(e => {
        e.addEventListener('click', (sw) => {
            sw.stopPropagation(); sw.preventDefault();
            let toClose = document.querySelectorAll(e.getAttribute('data-closes'))
            toClose.forEach(t => {
                t.classList.add('hidden')
            })
        })
    })

    let openSwitches = document.querySelectorAll('*[data-opens]')
    openSwitches.forEach(e => {
        e.addEventListener('click', (sw) => {
            sw.stopPropagation(); sw.preventDefault();
            let toOpen = document.querySelectorAll(e.getAttribute('data-opens'))
            toOpen.forEach(t => {
                t.classList.remove('hidden')
            })
        })
    })

    let toggleSwitches = document.querySelectorAll('*[data-toggles]')
    toggleSwitches.forEach(e => {
        e.addEventListener('click', (sw) => {
            sw.stopPropagation(); sw.preventDefault();
            let toToggle = document.querySelectorAll(e.getAttribute('data-toggles'))
            toToggle.forEach(t => {
                t.classList.toggle('hidden')
            })
        })
    })
}