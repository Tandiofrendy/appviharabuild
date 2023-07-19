<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Roleadmin;
use Illuminate\Support\Facades\Auth;
use PDO;

class PagesController extends Controller
{
    
    public function layoutsOnboarding()
    {
        return view('pages/layouts-onboarding');
    }

    public function dashboardsPandita()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' ,Auth::user()->email)->first();

        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/dashboards-Pandita');
        }else{
            abort(403);
        }
 
    }

    public function dashboardsUser()
    {
        return view('pages/dashboards-User');
    }
    public function userdashboard()
    {
        return view('pages/dashboards-blank');
    }
    public function formsusersetting()
    {
        return view('pages/forms-usersetting');
    }
    public function formkategorikegiatan()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-kategorikegiatan');
        }else{
            abort(403);
        }
    }
    public function formaddjadwal()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-addjadwal');
        }else{
            abort(403);
        }
        
    }
    public function formdaftardiksa()
    {
        return view('pages/forms-daftardiksa');
    }
    public function formadminuser()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-adminuser-setting');
        }else{
            abort(403);
        }
    }
    public function formusertable()
    {

        return view('pages/forms-userdetailtable-setting');
    }
    public function formbuatkartu()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();

        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-buatkartu-diksa');
        }else{
            abort(403);
        }
    }
    public function layoutslapjadwal()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/layouts-laporanjadwal');
        }else{
            abort(403);
        }
    }
    public function layoutsabsenkegiatan()
    {
        return view('pages/layouts-scanabsensi');
    }
    public function layoutskegiatan()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/layouts-laporankegiatan');
        }else{
            abort(403);
        }
    }
    public function layoutslaporandiksa(){
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
      
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/layouts-laporan-diksa');
        }else{
            abort(403);
        }
    }
    public function formdivisi()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-divisi');
        }else{
            abort(403);
        }
    }
    public function formaddvihara()
    {
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
        
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
             return view('pages/forms-add-vihara');
        }else{
            abort(403);
        }
   
    }
    public function formadmitjw(){
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-admit-jadwal');
        }else{
            abort(403);
        }
    }
    public function formfilterdiksa(){
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
        
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-filterlaporandiksa');
        }else{
            abort(403);
        }
    }
    public function formabsensi(){
        return view('pages/forms-absensi');
    }
    public function formfilterkegiatan(){
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
       
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
            return view('pages/forms-filterkegiatan');
        }else{
            abort(403);
        }
    }
    public function layoutsjadwal(){
        
        return view('pages/layouts-jadwalkegiatan');
    }
    public function layoutssumbangan(){
        return view('pages/layouts-scansumbangan');
    }
    public function formsumbangan(){
        return view('pages/forms-scansumbangan');
    }
    public function formregisadmin(){
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
        if($roleadmin != null){
            $this->authorize('admin',$roleadmin);
        return view('pages/forms-regisadmin');
        }else{
            abort(403);
        }
    }
}
