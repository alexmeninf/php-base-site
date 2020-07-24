<section class="wrap-default" id="form">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-md-1">
        <div class="title-wrap dark small">
          <h2 class="title color-life wow fadeInRight">Faça sua inscrição</h2>
          <p class="wow fadeInRight" data-wow-delay=".2s">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Possimus mollitia tempore repellendus harum at facere odit.</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-wrap">
          <h3 class="text-dark">Envie seus dados, que entraremos em contato</h3>

          <form action="javascript:void(0);" method="POST" id="form_digital" class="form-main outlined-basic mt-4">
            <label class="form-group wow fadeInUp" data-wow-delay=".1s">
              <input type="text" id="input_name" name="nome" placeholder="&nbsp;" autocomplete="off">
              <span class="txt">Seu Nome <sup>*</sup></span>
              <span class="bar"></span>
            </label>

            <label class="form-group wow fadeInUp" data-wow-delay=".2s" title="E-mail para contato">
              <input type="email" id="input_email" name="e-mail" placeholder="&nbsp;">
              <span class="txt">E-mail <sup>*</sup></span>
              <span class="bar"></span>
            </label>

            <label class="form-group wow fadeInUp" data-wow-delay=".3s" title="Telefone para contato">
              <input type="text" class="phone" id="input_phone" name="telefone" placeholder="&nbsp;" autocomplete="off">
              <span class="txt">Telefone <sup>*</sup></span>
              <span class="bar"></span>
            </label>

            <input type="hidden" value="<?php bloginfo('name') ?>" name="title_site" id="title_site">
            <button type="submit" class="btn btn-form wow zoomIn">Enviar <i
                class="fas fa-angle-double-right"></i></button>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>