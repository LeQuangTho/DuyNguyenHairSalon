@extends('LayoutWeb/master')
@section('body')
<div class="blog">
    <div class="scope">
        <span style="--i:1;"><img src="{{asset('haircare/images/work-1.jpg')}}" alt="not found"></span>
        <span style="--i:2;"><img src="{{asset('haircare/images/work-2.jpg')}}" alt="not found"></span>
        <span style="--i:3;"><img src="{{asset('haircare/images/work-3.jpg')}}" alt="not found"></span>
        <span style="--i:4;"><img src="{{asset('haircare/images/work-4.jpg')}}" alt="not found"></span>
        <span style="--i:5;"><img src="{{asset('haircare/images/work-5.jpg')}}" alt="not found"></span>
        <span style="--i:6;"><img src="{{asset('haircare/images/work-6.jpg')}}" alt="not found"></span>
        <span style="--i:7;"><img src="{{asset('haircare/images/work-7.jpg')}}" alt="not found"></span>
        <span style="--i:8;"><img src="{{asset('haircare/images/work-8.jpg')}}" alt="not found"></span>
    </div>
</div>
<style>
.blog {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: #000;
  background: -webkit-linear-gradient(to right, #2c5364, #203a43, #0f2027);
  overflow: hidden;
}
.scope {
  position: relative;
  width: 200px;
  height: 200px;
  transform-style: preserve-3d;
  animation: slid 30s linear infinite;
}

.scope span {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transform-origin: center;
  transform-style: preserve-3d;
  transform: rotateY(calc(var(--i) * 45deg)) translateZ(350px);
}
.scope span img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  object-fit: cover;
  transition: 2s;
}
.scope span:hover img {
  transform: translateY(-50px) scale(1.5);
}
@keyframes slid {
  0% {
    transform: perspective(1000px) rotateY(0deg);
  }
  100% {
    transform: perspective(1000px) rotateY(360deg);
  }
}

</style>