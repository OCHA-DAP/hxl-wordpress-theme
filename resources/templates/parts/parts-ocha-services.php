<?php
/**
 * OCHA Services menu
 */
?>

<section id="cd-ocha-services" class="cd-ocha">
    <!-- Dropdown toggle is created with javascript -->

    <h2 id="cd-ocha-services-title">OCHA Services</h2>

    <div
            class="cd-global-header__dropdown cd-ocha-dropdown cd-dropdown"
            id="cd-ocha-dropdown"
            aria-labelledby="cd-ocha-services-title"
            data-cd-toggable="OCHA Services"
            data-cd-icon="arrow-down" data-cd-logo="ocha-logo"
            data-cd-component="cd-ocha"
            data-cd-replace="cd-ocha-services-title">

        <div class="cd-ocha-dropdown__inner">
            <div class="cd-ocha-dropdown__section">
				<?php get_template_part('resources/templates/parts/parts', 'related-platforms'); ?>
            </div>
            <div class="cd-ocha-dropdown__section">
                <p class="cd-ocha-dropdown__heading">Other OCHA Services</p>
                <ul class="cd-ocha-dropdown__list">
                    <li class="cd-ocha-dropdown__link"><a href="https://fts.unocha.org/">Financial Tracking Service</a>
                    </li>
                    <li class="cd-ocha-dropdown__link"><a href="https://data.humdata.org/">Humanitarian Data
                            Exchange</a></li>
                    <li class="cd-ocha-dropdown__link"><a href="https://humanitarian.id/">Humanitarian ID</a></li>
                    <li class="cd-ocha-dropdown__link"><a href="https://humanitarianresponse.info/">Humanitarian
                            Response</a></li>
                </ul>
            </div>
            <div class="cd-ocha-dropdown__section">
                <p class="cd-ocha-dropdown__heading" aria-hidden="true">&nbsp;</p>
                <ul class="cd-ocha-dropdown__list">
                    <li class="cd-ocha-dropdown__link"><a href="https://interagencystandingcommittee.org">Inter-Agency
                            Standing Committee</a></li>
                    <li class="cd-ocha-dropdown__link"><a href="https://unocha.org/">OCHA website</a></li>
                    <li class="cd-ocha-dropdown__link"><a href="https://reliefweb.int/">ReliefWeb</a></li>
                    <li class="cd-ocha-dropdown__link"><a href="https://vosocc.unocha.org/">Virtual OSOCC</a></li>
                </ul>
            </div>
            <div class="cd-ocha-dropdown__section">
                <a class="cd-button cd-button--light cd-button--bold cd-button--uppercase cd-ocha-dropdown__see-all"
                   href="https://www.unocha.org/ocha-digital-services" target="_blank" rel="noopener">See all</a>
            </div>
        </div>
    </div>
</section>
<section id="cd-ocha-services" class="cd-ocha cd-ocha__right">
  <span class="cd-ocha__btn-label cd-ocha__btn-label-faq">
    <a href="<?= home_url() ?>/how-it-works/#faq" class="cd-ocha__btn" aria-label="FAQ link">
      <svg class="icon-o-help" viewBox="0 0 48 48">
        <path d="M29,43a5,5,0,0,1-5,5,5,5,0,1,1,3.53-8.53A4.82,4.82,0,0,1,29,43Z"></path>
        <path d="M24,0A11,11,0,0,0,13,11a4,4,0,0,0,8,0,3,3,0,0,1,6,0h0c0,2-.64,3-2.33,4.67-2,2-4.67,4.67-4.67,9.33v5a4,4,0,0,0,8,0V25c0-1.23.64-2,2.33-3.67A14.43,14.43,0,0,0,35,11h0A11,11,0,0,0,24,0Z"></path>
      </svg>
      <span>FAQ</span>
    </a>
  </span>
</section>
