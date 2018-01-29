<div class="col-lg-3">


  <div class="list-group">
    <h4 class="p-2 text-center mt-4 bg-primary text-white">CATEGORY</h4>
    @foreach($cats as $ck => $cv)
    <a href="#" class="list-group-item">{{ucfirst($cv->title)}}</a>
    @endforeach
  </div>
</div>
<!-- /.col-lg-3 -->
