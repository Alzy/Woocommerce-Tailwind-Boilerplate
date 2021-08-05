</div>
<?php wp_footer() ?>
<script>
    window.isMobile = false
    if( (/Android|webOS|Mobile|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) || (navigator.userAgent.match(/Mac/) && navigator.maxTouchPoints && navigator.maxTouchPoints > 2)) {
        const hAv = document.querySelector('.h-available')
        console.log('mobile!', hAv)
        window.isMobile = true
        hAv.style.height = `${window.innerHeight}px`
        if (navigator.userAgent.match(/Mac/) && navigator.maxTouchPoints && navigator.maxTouchPoints > 2) {
            document.body.classList.add('iPad')
        }
    }
</script>
</body>
</html>