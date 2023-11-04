<?php $this->section('contacts');?>
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2 class="textOld">Наши <span>Контакты</span></h2>
            <p>Заходите к нам! Мы всегда Вам рады</p>
        </div>
    </div>

    <div class="map">

        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.0675274774926!2d55.94671682439299!3d54.72602702437337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d93a44cbd10fa1%3A0x69b900fa191d833f!2z0YPQuy4g0JrRgNGD0L_RgdC60L7QuSwgNCwg0KPRhNCwLCDQoNC10YHQvy4g0JHQsNGI0LrQvtGA0YLQvtGB0YLQsNC9LCA0NTAwNzc!5e0!3m2!1sru!2sru!4v1679429756123!5m2!1sru!2sru" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container mt-5" id="messageInfo">

        <div class="info-wrap">
            <div class="row">
                <div class="col-lg-3 col-md-6 info">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Адрес:</h4>
                    <p>Крупской д. 4<br>Уфа, Россия</p>
                </div>

                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                    <i class="bi bi-clock"></i>
                    <h4>Часы работы:</h4>
                    <p>09:00 - 22:00</p>
                </div>

                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p><a href="mailto:info@cafevm.ru">info@cafevm.ru</a></p>
                </div>

                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                    <i class="bi bi-phone"></i>
                    <h4>Телефон:</h4>
                    <p><a href="tel:+7 965 665-41-11"> <span>+7 965 665-41-11</span></a></p>
                </div>
            </div>
        </div>

        <form v-on:submit.prevent="makeRequest" action="/messageInfo"  method="post" role="form" class="php-email-form">
            <template v-if="success==false">
            <div class="row">
                <div class="col-md-6 form-group">
                    <template v-if="name_error==false">
                        <input type="text" name="name" v-model.trim="name" autocomplete="new-name" class="form-control" id="name" placeholder="Ваше Имя"/>
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input type="text" style="border:  1px solid darkred" name="name" v-on:focus="remove_error('name_error')"  v-model.trim="name"  class="form-control" id="name" placeholder="Ваше Имя"/>

                    </template>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <template v-if="phone_error==false">
                        <input type="tel" class="form-control" v-model.trim="phone" v-phone autocomplete="new-phone" name="phone" id="phone" placeholder="Ваш телефон"/>
                    </template>
                    <template v-else>
                        <sup>Пожалуйста, заполните это поле</sup>
                        <input type="tel" style="border:  1px solid darkred" v-on:focus="remove_error('phone_error')" class="form-control" v-model="phone" v-phone autocomplete="new-phone" name="phone" id="phone" placeholder="Ваш телефон"/>
                    </template>
                </div>
            </div>
            <div class="form-group mt-3">
                <template v-if="subject_error==false">
                    <input type="text" name="name" v-model.trim="subject" autocomplete="new-name" class="form-control" id="name" placeholder="Тема сообщения"/>
                </template>
                <template v-else>
                    <sup>Пожалуйста, заполните это поле</sup>
                    <input type="text" style="border:  1px solid darkred" name="name" v-on:focus="remove_error('subject_error')"  v-model.trim="subject"  class="form-control" id="name" placeholder="Тема сообщения"/>
                </template>
            </div>
            <div class="form-group mt-3">
                <template v-if="message_error==false">
                    <textarea class="form-control" v-model.trim="message" name="message" rows="5" placeholder="Ваше сообщение" required></textarea>
                </template>
                <template v-else>
                    <sup>Пожалуйста, заполните это поле</sup>
                    <textarea class="form-control" v-model.trim="message" style="border:  1px solid darkred" name="message" v-on:focus="remove_error('message_error')" rows="5" placeholder="Ваше сообщение" required></textarea>
                </template>
            </div>
            <div class="text-center"><button type="submit">Отправить сообщение</button></div>
            </template>
            <template v-else>
                <div class="text-center">
                    <p class="book-a-table-btn">Спасибо! <br/>Мы скоро свяжемся с вами</p>
                </div>
            </template>
        </form>

    </div>
</section><!-- End Contact Section -->
<script src="assets/js/phonemask.js"></script>
<script>
    const messageInfo = new Vue({
        el:'#messageInfo',
        data:{
            success:false,
            name_error:false,
            phone_error:false,
            subject_error:false,
            message_error:false,
            name:null,
            phone:null,
            subject:null,
            message:null,
            rules:{
                name:{ min:2,max:125 },
                phone:{ len:18 },
                subject:{ min:2,max:255 },
                message:{ min:8 }
            }
        },
        methods:{
            remove_error(error_name){
                if (error_name  ==  'name_error'){return this.name_error = false}
                if (error_name  ==  'phone_error'){return this.phone_error = false}
                if (error_name  ==  'subject_error'){return this.subject_error = false}
                if (error_name  ==  'message_error'){return this.message_error = false}
            },
            checkvalid(){
                let result = true
                if (this.name  ==  null){
                    this.name_error = true
                    result = false}
                if (this.phone  ==  null){
                    this.phone_error = true
                    result = false}
                if (this.subject  ==  null){
                    this.subject_error = true
                    result = false}
                if (this.message  ==  null){
                    this.message_error = true
                    result = false}
                if (result) {
                    let rname = this.name.length
                    let rphone = this.phone.length
                    let rsubject = this.subject.length
                    let rmessage = this.message.length
                    if(rname < this.rules.name.min || rname > this.rules.name.max){
                        this.name_error = true
                        result = false
                    }
                    if(rphone !== this.rules.phone.len){
                        this.phone_error = true
                        result = false
                    }
                    if(rsubject < this.rules.subject.min || rsubject > this.rules.subject.max){
                        this.subject_error = true
                        result = false
                    }
                    if(rmessage < this.rules.message.min){
                        this.message_error = true
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
                        'subject':this.subject,
                        'message':this.message,
                        'mode':'site'
                    }
                    axios.post('/messageInfo',forma).then(res=>{
                        if (res.data == 'success'){
                            this.success = true
                        }
                    })
                }
            }
        }
    })
</script>
<?php $this->endSection('contacts');?>
