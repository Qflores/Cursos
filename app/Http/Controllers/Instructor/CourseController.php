<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Support\Facades\Storage;



class CourseController extends Controller
{
   
    public function __construct(){
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create','store');
        $this->middleware('can:Editar cursos')->only('edit','update','goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }

        
    //use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //muestra lista de cursos
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $levels =Level::pluck('name','id');
        $prices =Price::pluck('name','id');
               
        return view('instructor.courses.create',compact('categories','levels','prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = "";
        $request->validate([
            'title'=>['required','min:10','max:255'],
            'subtitle'=>['required','min:10','max:255'],
            'slug'=>['required','min:10','max:255','unique:courses'],
            'description'=>['required','min:15'],

            'credito'=>['required','min:1','max:20'],
            'hora'=>['required'],
            'registro'=>['required','min:1','max:20'],
            'libro'=>['required','min:1','max:255'],

            'level_id'=>['required'],
            'category_id'=>['required'],
            'price_id'=>['required'],
            'file'=>'image'
        ]);

        $course = Course::create($request->all());

        //para mover la imagen se utiliza packageStorage
        if($request->file('file')){
            //nombre de la carpeta
            //ruta para guardar
            $url = Storage::put('cursos',$request->file('file'));
            $course->image()->create([
                'url'=>$url
            ]);
        }

        return  redirect()->route('instructor.courses.edit',$course)->with('sms','Curso Guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        // con esto restringimos solo edicion del curso del propietario
        $this->authorize('dicatated', $course);
        //solo retorna array con los  nombre de las categorias
        $categories = Category::pluck('name','id');
        $levels =Level::pluck('name','id');
        $prices =Price::pluck('name','id');

        return view('instructor.courses.edit',compact('course','categories','levels','prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // con esto restringimos solo edicion del curso del propietario
        $this->authorize('dicatated',$course);

        $url = "";
        $request->validate([
            'title'=>['required','min:10','max:255'],
            'subtitle'=>['required','min:10','max:255'],
            'slug'=>'required|unique:courses,slug,' . $course->id,
            'description'=>['required','min:15'],

            'credito'=>['required','min:1','max:20'],
            'hora'=>['required'],
            'registro'=>['required','min:1','max:20'],
            'libro'=>['required','min:1','max:255'],
            
            'level_id'=>'required',
            'category_id'=>'required',
            'price_id'=>'required',
            'file'=>'image'
            
        ]);

        $course->update($request->all());
        //para mover la imagen se utiliza packageStorage
        if($request->file('file')){
            //nombre de la carpeta
            //ruta para guardar
            $url = Storage::put('cursos',$request->file('file'));
            //si existe una imagen eliminar
            if($course->image){
                Storage::delete($course->image->url);
                
                $course->image->update([
                    'url'=>$url
                ]);
            } else{
                $course->image()->create([
                    'url'=>$url
                ]);
            } 
        }

        return  redirect()->route('instructor.courses.edit',$course)->with('sms','Curso Guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }


    public function goals(Course $course){
        
        $this->authorize('dicatated', $course);

        return view('instructor.courses.goals', compact('course'));

    }
    public function status(Course $course){
        
       $course->status = 2;
       
       if($course->observation){
           $course->observation->delete;
       }

       $course->save();
        //retorna a la pagina anterior
        return back();

    }
}
