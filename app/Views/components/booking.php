<?php $this->section('booking'); ?>
<section id="book-a-table" class="book-a-table">
    <div class="container" id="bookingAPP">

        <div class="section-title">
            <h2 class="textOld">Бронь <span>Столика</span></h2>
          <!--  <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>-->
        </div>

        <form v-on:submit.prevent="makeRequest" action="/bookingTable" method="post" role="form" class="php-email-form">
            <template v-if="success == false">
                <div class="row" >
                <div class="col-lg-4 col-md-6 form-group">
                    <template v-if="name_error==false">
                        <input type="text" name="name" v-model.trim="name" autocomplete="new-name" class="form-control" id="name" placeholder="Ваше Имя"/>
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input type="text" style="border:  1px solid darkred" name="name" v-on:focus="remove_error('name_error')"  v-model.trim="name"  class="form-control" id="name" placeholder="Ваше Имя"/>

                    </template>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <template v-if="phone_error==false">
                        <input type="tel" class="form-control" v-model.trim="phone" v-phone autocomplete="new-phone" name="phone" id="phone" placeholder="Ваш телефон"/>
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input type="tel" style="border:  1px solid darkred" v-on:focus="remove_error('phone_error')" class="form-control" v-model="phone" v-phone autocomplete="new-phone" name="phone" id="phone" placeholder="Ваш телефон"/>
                    </template>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <template v-if="date_error==false">
                        <input type="date" v-model="date" name="date" class="form-control" id="date" placeholder="Дата брони"/>
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input type="date" style="border:  1px solid darkred" v-on:focus="remove_error('date_error')" v-model="date" name="date" class="form-control" id="date" placeholder="Дата брони"/>
                    </template>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <template v-if="timer_error==false">
                        <input type="time" min="09:00" max="22:00" v-model="timer" class="form-control" name="time" id="time" placeholder="Время">
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input type="time" style="border:  1px solid darkred" v-on:focus="remove_error('timer_error')"  v-model="timer" class="form-control" name="time" id="time" placeholder="Время">
                    </template>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <template v-if="persons_error==false">
                        <input type="number" min="1" max="35" v-model.number="persons" class="form-control" name="people" id="people" placeholder="Количество персон" />
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input style="border:  1px solid darkred" v-on:focus="remove_error('persons_error')" type="number" v-model.number="persons" class="form-control" name="people" id="people" placeholder="Количество персон" />
                    </template>
                </div>
            </div>
                <div class="form-group mt-3">
                <textarea class="form-control" v-model="wishing" name="message" rows="5" placeholder="Пожелания"></textarea>
            </div>
                <div class="text-center"><button type="submit">Забронировать столик</button></div>
            </template>
            <template v-else>
                <div class="text-center">
                    <p class="book-a-table-btn">Спасибо! <br/>Мы скоро перезвоним, чтобы подтвердить бронь</p>
                </div>
            </template>
        </form>
    </div>
    <script src="assets/js/phonemask.js"></script>
    <script>

        const BookingApp = new Vue({
           el:'#bookingAPP',
           data:{
               success:false,
               name_error:false,
               phone_error:false,
               date_error:false,
               timer_error:false,
               persons_error:false,
               name:null,
               phone:null,
               date:null,
               timer:null,
               persons:2,
               wishing:null,
               rules:{
                   name:{ min:2,max:125 },
                   phone:{ len:18 },
                   date:{ len:10 },
                   timer:{ len:5 },
                   persons: { min:1,max:5 }
               }
           },
           methods:{
               remove_error(error_name){
                   if (error_name  ==  'name_error'){return this.name_error = false}
                   if (error_name  ==  'phone_error'){return this.phone_error = false}
                   if (error_name  ==  'date_error'){return this.date_error = false}
                   if (error_name  ==  'timer_error'){return this.timer_error = false}
                   if (error_name  ==  'persons_error'){return this.persons_error = false}
               },
               checkvalid(){
                   let result = true
                   if (this.name  ==  null){
                       this.name_error = true
                       result = false}
                   if (this.phone  ==  null){
                       this.phone_error = true
                       result = false}
                   if (this.date  ==  null){
                       this.date_error = true
                       result = false}
                   if (this.timer  ==  null){
                       this.timer_error = true
                       result = false}
                   if (this.persons  < 1 ){
                       this.persons_error = true
                       result = false}
                   if (result) {
                       let rname = this.name.length
                       let rphone = this.phone.length
                       let rdate = this.date.length
                       let rtimer = this.timer.length
                       if(rname < this.rules.name.min || rname > this.rules.name.max){
                           this.name_error = true
                           result = false
                       }
                       if(rphone !== this.rules.phone.len){
                           this.phone_error = true
                           result = false
                       }
                       if(rdate !== this.rules.date.len){
                           this.date_error = true
                           result = false
                       }
                       if(rtimer !== this.rules.timer.len){
                           this.timer_error = true
                           result = false
                       }
                   }
                   return result
               },
               makeRequest(){
                    if (this.checkvalid()){
                        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                        let forma = {
                            '<?=csrf_token()?>':'<?=csrf_hash()?>',
                            'name':this.name,
                            'phone':this.phone,
                            'date':this.date,
                            'time':this.timer,
                            'persons':this.persons,
                            'wish':this.wishing,
                            'mode':'site'
                        }
                        axios.post('/bookingTable',forma).then(res=>{
                            if (res.data == 'success'){
                                this.success = true
                            }
                        })
                    }
               }
           }
        });
    </script>
</section><!-- End Book A Table Section -->
<?php $this->endSection();?>
