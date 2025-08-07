   <section class="contact-section">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <h2 class="contact-title">Добавить запись</h2>
               </div>
               <div class="col-lg-12">
                   <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                       <div class="row">
                           <div class="col-12">
                               <div class="form-group">
                                   <input class="form-control" name="title" id="title" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Название записи'" placeholder="Название записи">
                               </div>
                           </div>
                           <div class="col-12">
                               <div class="form-group">
                                   <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Текст записис'" placeholder="Текст записис"></textarea>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Имя">
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                               </div>
                           </div>
                       </div>
                       <div class="form-group mt-3">
                           <button type="submit" class="button button-contactForm boxed-btn">Отправить</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>