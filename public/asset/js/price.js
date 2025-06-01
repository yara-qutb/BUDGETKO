document.addEventListener('DOMContentLoaded', function() {
    const minInput = document.getElementById('min-input-id');
    const maxInput = document.getElementById('max-input-id');
    const maxTooltip = document.querySelector('.max-tooltip');
    const minTooltip = document.querySelector('.min-tooltip');
    const products = document.querySelectorAll('.pro');
    const minGap = 0;
    const range = document.querySelector('.slider-track');
    const sliderMinValue = parseInt(minInput.min);
    const sliderMaxValue = parseInt(maxInput.max);
    const filters = document.querySelectorAll('.website-filter');
    const sliders = document.querySelectorAll('.slider_outer');

    function filterProductsByWebsite() {
        const checkedWebsites = Array.from(filters)
            .filter(filter => filter.checked)
            .map(filter => filter.value);

        sliders.forEach(slider => {
            const sliderWebsite = slider.getAttribute('data-website');
            if (checkedWebsites.includes(sliderWebsite)) {
                slider.style.display = '';
            } else {
                slider.style.display = 'none';
            }
        });
    }

    filters.forEach(filter => {
        filter.addEventListener('change', filterProductsByWebsite);
    });

    function slideMin() {
        let gap = parseInt(maxInput.value) - parseInt(minInput.value);
        if (gap <= minGap) {
            minInput.value = parseInt(maxInput.value) - minGap;
        }
        minTooltip.innerHTML = minInput.value + "LE";;
        setArea();
    }

    function slideMax() {
        let gap = parseInt(maxInput.value) - parseInt(minInput.value);
        if (gap <= minGap) {
            maxInput.value = parseInt(minInput.value) + minGap;
        }
        maxTooltip.innerHTML = maxInput.value + "LE";
        setArea();
    }

    function setArea() {
        range.style.left = (minInput.value / sliderMaxValue) * 100 + "%";
        minTooltip.style.left = (minInput.value / sliderMaxValue) * 100 + "%";
        range.style.right = 100 - (maxInput.value / sliderMaxValue) * 100 + "%";
        maxTooltip.style.right = 100 - (maxInput.value / sliderMaxValue) * 100 + "%";
    }

    function filterProducts() {
        const minPrice = parseInt(minInput.value);
        const maxPrice = parseInt(maxInput.value);

        products.forEach(product => {
            const productPriceElement = product.querySelector('.product-price');
            const productPrice = parseInt(productPriceElement.textContent);

            if (productPrice >= minPrice && productPrice <= maxPrice) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    }

    minInput.addEventListener('input', function() {
        slideMin();
        filterProducts();
    });

    maxInput.addEventListener('input', function() {
        slideMax();
        filterProducts();
    });

    // Initial setup
    slideMin();
    slideMax();
    filterProducts();
    filterProductsByWebsite();
});
