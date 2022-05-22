@extends('main')

@section('content')

<!--Sup Form-->
<div class="container feedback_form">
    <div class="forma">

        <div class="form-at">

            <h1 > Напишите нам</h1>
            <div class="form-container form__wrapper">
                <!-- Форма обратной связи -->
                <form id="feedback-form"  enctype="multipart/form-data" novalidate>
                    <div class="form-row">
                        <!-- Имя пользователя -->
                        <div class="form-group">
                            <label for="name" class="control-label">Ваше имя</label>
                            <input id="name" type="text" name="name" class="form-control" value="" placeholder="Имя" minlength="2"
                                   maxlength="30" required="required">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Email пользователя -->
                        <div class="form-group">
                            <label for="email" class="control-label">Ваш Email</label>
                            <input id="email" type="email" name="email" required="required" class="form-control" value=""
                                   placeholder="Email-адрес">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <!-- Сообщение пользователя -->
                    <div class="form-group">
                        <label for="message" class="control-label">Сообщение </label>
                        <textarea id="message" name="message" class="form-control" rows="3"
                                  placeholder="Сообщение (не менее 20 символов)" minlength="20" maxlength="500"
                                  required="required"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Файлы, для прикрепления к форме -->
                    <div class="form-group form-attach" data-count="5">
                        <div class="form-attach__label">Файлы </div>
                        <div class="form-attach__wrapper">
                            <input type="file" name="attach[]" multiple required>
                            <div class="form-attach__description">
                                <div>Нажмите для загрузки файлов или перетащите их</div>
                                <div class="text-sm">PNG, JPG, GIF (до 512 Кбайт)</div>
                            </div>
                            <div class="form-attach__items"></div>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>



                    <!-- Сообщение об ошибке -->
                    <!--<div class="form-error ">Исправьте данные и отправьте форму ещё раз.</div>-->

                    <!-- Кнопка для отправки формы на сервер -->
                    <div class="form-submit">
                        <button type="submit" class="btn support-btn" >Отправить сообщение</button>

                    </div>

                </form>

                <!-- Сообщение об успешной отправки формы -->
                <!--<div class="form-success ">-->
                <!-- <div ">Форма успешно отправлена. Нажмите-->
                <!--    <button >здесь</button>, если нужно отправить ещё одну форму.</div>-->
                <!--  </div>-->

            </div>
            <div class="result-at"></div>
        </div>
    </div>
</div>

@endsection
