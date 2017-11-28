@extends('giaodien.master')
@section('giaodien')
<div class="datve">
  <div class="container">
      <div class="row">
          <form action="" method="POST">
            <div>
              <label>Chọn ngày xem</label>
              <select name="" class="form-control">
                <option value="">Chọn ngày chiếu</option>
                <option value="">24</option>
                <option value="">25</option>
                <option value="">26</option>
                <option value="">27</option>
              </select>
            </div>

            <div>
              <label>Chọn giờ xem</label>
              <select name="" class="form-control">
                <option value="">Chọn giờ chiếu</option>
                <option value="">08:30</option>
                <option value="">17:45</option>
                <option value="">20:00</option>
                <option value="">10:01</option>
              </select>
            </div>

            <div>
              <label>Chọn ghế</label>
              <div class="screen">Màn hình</div>
              <div class="hangA">
                  <label>A</label>
                  <div><input type="checkbox" name="ghe" value="1">1</div>
                  <div><input type="checkbox" name="ghe" value="2">2</div>
                  <div><input type="checkbox" name="ghe" value="3">3</div>
                  <div><input type="checkbox" name="ghe" value="4">4</div>
                  <div><input type="checkbox" name="ghe" value="5">5</div>
                  <div><input type="checkbox" name="ghe" value="6">6</div>
                  <div><input type="checkbox" name="ghe" value="7">7</div>
                  <div><input type="checkbox" name="ghe" value="8">8</div>
                  <div><input type="checkbox" name="ghe" value="9">9</div>
                  <div><input type="checkbox" name="ghe" value="10">10</div>
              </div>

              <div class="hangB">
                  <label>B</label>
                  <div><input type="checkbox" name="ghe" value="11">1</div>
                  <div><input type="checkbox" name="ghe" value="12">2</div>
                  <div><input type="checkbox" name="ghe" value="13">3</div>
                  <div><input type="checkbox" name="ghe" value="14">4</div>
                  <div><input type="checkbox" name="ghe" value="15">5</div>
                  <div><input type="checkbox" name="ghe" value="16">6</div>
                  <div><input type="checkbox" name="ghe" value="17">7</div>
                  <div><input type="checkbox" name="ghe" value="18">8</div>
                  <div><input type="checkbox" name="ghe" value="19">9</div>
                  <div><input type="checkbox" name="ghe" value="20">10</div>
              </div>

              <div class="hangB">
                  <label>C</label>
                  <div><input type="checkbox" name="ghe" value="21">1</div>
                  <div><input type="checkbox" name="ghe" value="22">2</div>
                  <div><input type="checkbox" name="ghe" value="23">3</div>
                  <div><input type="checkbox" name="ghe" value="24">4</div>
                  <div><input type="checkbox" name="ghe" value="25">5</div>
                  <div><input type="checkbox" name="ghe" value="26">6</div>
                  <div><input type="checkbox" name="ghe" value="27">7</div>
                  <div><input type="checkbox" name="ghe" value="28">8</div>
                  <div><input type="checkbox" name="ghe" value="29">9</div>
                  <div><input type="checkbox" name="ghe" value="30">10</div>
              </div>

            </div>
            <button type="button" class="btn btn-primary btn-next">Tiếp tục</button>
          </form>
      </div>
  </div>
</div>
@endsection