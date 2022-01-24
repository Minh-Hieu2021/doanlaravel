   <!-- Sidebar menu-->
   <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
   <aside class="app-sidebar">
     <div class="app-sidebar__user">
       <div>
         <p class="app-sidebar__user-name">@foreach ($value as $item)
            {{ $item->HoTen }}
         @endforeach</p>
       </div>
     </div>
     <ul class="app-menu">
       <li>
         <a class="app-menu__item active" href="{{ route('admin.dashboard') }}"
           ><i class="app-menu__icon fa fa-dashboard"></i
           ><span class="app-menu__label">Dashboard</span></a
         >
       </li>
       <li>
         <a class="app-menu__item" href="{{ route('admin.nhanvien') }}"
           ><i class="app-menu__icon fa fa-pie-chart"></i
           ><span class="app-menu__label">Nhân viên</span></a>
       </li>
       <li>
        <a class="app-menu__item" href="{{ route('admin.khachhang') }}"
          ><i class="app-menu__icon fa fa-pie-chart"></i
          ><span class="app-menu__label">Khách hàng</span></a>
      </li>
       <li>
         <a class="app-menu__item" href="{{ route('admin.sanpham') }}"
           ><i class="app-menu__icon fa fa-pie-chart"></i>
           <span class="app-menu__label">Sản Phẩm</span></a>
       </li>
       <a class="app-menu__item" href="{{ route('admin.hoadonnhap') }}"
          ><i class="app-menu__icon fa fa-pie-chart"></i
          ><span class="app-menu__label">Hoá đơn nhập</span></a>
      </li>
      <li>
        <a class="app-menu__item" href="{{ route('admin.chitiethoadonnhap') }}"
          ><i class="app-menu__icon fa fa-pie-chart"></i
          ><span class="app-menu__label">Chi tiết hoá đơn nhập</span></a>
      </li>
       <li class="treeview">
         <a class="app-menu__item" href="#" data-toggle="treeview"
           ><i class="app-menu__icon fa fa-file-text"></i
           ><span class="app-menu__label">Thống kê chi tiết</span
           ><i class="treeview-indicator fa fa-angle-right"></i
         ></a>
         <ul class="treeview-menu">
           <li>
             <a class="treeview-item" href="{{ route('admin.thongkechitiet.doanhthu') }}"
               ><i class="icon fa fa-circle-o"></i> Doanh thu</a
             >
           </li>
           <li>
             <a class="treeview-item" href="{{ route('admin.thongkechitiet.doanhso') }}"
               ><i class="icon fa fa-circle-o"></i> Danh số bán hàng</a
             >
           </li>
           <li>
             <a class="treeview-item" href="{{ route('admin.thongkechitiet.topsanpham') }}"
               ><i class="icon fa fa-circle-o"></i>Top sản phẩm bán chạy</a
             >
           </li>
           <li>
             <a class="treeview-item" href="{{ route('admin.thongkechitiet.tongtienkhachchi') }}"
               ><i class="icon fa fa-circle-o"></i> Tổng tiền khách hàng đã chi</a
             >
           </li>
           <li>
             <a class="treeview-item" href="{{ route('admin.thongkechitiet.danhsachhoadontheokhoangthoigian') }}"
               ><i class="icon fa fa-circle-o"></i> Danh sách hóa đơn theo khoảng thời gian</a
             >
           </li>
         </ul>
       </li>
     </ul>
   </aside>
