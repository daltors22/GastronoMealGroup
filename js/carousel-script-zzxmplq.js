document.addEventListener('DOMContentLoaded', () => {
    const trackZZXMPLQ = document.querySelector('.carrousel-track-zzxmplq');
    const slidesZZXMPLQ = Array.from(trackZZXMPLQ.children);
    const nextButtonZZXMPLQ = document.querySelector('.carrousel-btn-right-zzxmplq');
    const prevButtonZZXMPLQ = document.querySelector('.carrousel-btn-left-zzxmplq');
  
    let currentIndexZZXMPLQ = 0;
  
    function updateSlidePositionZZXMPLQ() {
      const slideWidth = slidesZZXMPLQ[0].getBoundingClientRect().width;
      trackZZXMPLQ.style.transform = `translateX(-${slideWidth * currentIndexZZXMPLQ}px)`;
    }
  
    nextButtonZZXMPLQ.addEventListener('click', () => {
      currentIndexZZXMPLQ = (currentIndexZZXMPLQ + 1) % slidesZZXMPLQ.length;
      updateSlidePositionZZXMPLQ();
    });
  
    prevButtonZZXMPLQ.addEventListener('click', () => {
      currentIndexZZXMPLQ = (currentIndexZZXMPLQ - 1 + slidesZZXMPLQ.length) % slidesZZXMPLQ.length;
      updateSlidePositionZZXMPLQ();
    });
  
    window.addEventListener('resize', updateSlidePositionZZXMPLQ);
    updateSlidePositionZZXMPLQ();
  });
  