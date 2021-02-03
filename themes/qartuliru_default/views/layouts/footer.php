<footer class="footer-base">
    <div class="content">
        <?php echo  str_replace(
                '{year}', date('Y'),
                Yii::$app
                    ->sw->getModule('block')
                    ->item('findOne', ['tech_name' => 'footer'])
                    ->text ?? '');
         ?>
    </div>
</footer>