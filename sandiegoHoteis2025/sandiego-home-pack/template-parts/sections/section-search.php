
<?php
/**
 * Section: Search Bar
 * Simple visual component; hook your booking engine in 'sandiego/search_button_url' filter.
 */
?>
<section class="sandiego searchbar container p-3 p-md-4">
  <form class="row g-3 align-items-end">
    <div class="col-12 col-sm-6 col-lg-3">
      <label class="form-label">Check-in</label>
      <input type="date" class="form-control" name="checkin">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <label class="form-label">Check-out</label>
      <input type="date" class="form-control" name="checkout">
    </div>
    <div class="col-6 col-lg-3">
      <label class="form-label">Hóspedes</label>
      <select class="form-select" name="hospedes">
        <?php for($i=1;$i<=8;$i++): ?>
          <option value="<?php echo $i; ?>"><?php echo sprintf('%02d',$i); ?></option>
        <?php endfor; ?>
      </select>
    </div>
    <div class="col-6 col-lg-3">
      <?php $url = apply_filters('sandiego/search_button_url', '#'); ?>
      <a class="btn btn-search w-100 d-flex justify-content-center align-items-center gap-2" href="<?php echo esc_url($url); ?>">
        <span class="visually-hidden">Buscar</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </a>
    </div>
  </form>
</section>
