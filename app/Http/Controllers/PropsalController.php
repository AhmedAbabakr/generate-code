<?php

namespace App\Http\Controllers;
use App\Propsal;
use Illuminate\Http\Request;

class PropsalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $propsals = Propsal::orderBy('id','desc')->paginate(5);
        $title = 'Propsals';
        return view('propsal.index',['propsals'=>$propsals,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $title = 'New Propsal';
        return view('propsal.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
              
        
       
        $rule = [
                    'client_name'       =>  'required|string|max:255',
                    'propsal_value'     =>  'required|string|max:255',
                    'propsal_type'      =>  'required',
                    'client_source'     =>  'required'
                ];

        $data = $this->validate(request(),$rule,[],[
                                                        'client_name'       => 'Client Name',
                                                        'propsal_value'     => 'Propsal Value',
                                                        'propsal_type'      => 'Propsal Type',
                                                        'client_source'     => 'Client Source'
                                                    ]);        
        $data['created_by'] = auth()->user()->id;
        $data['type_alias'] = $this->make_alias($data['propsal_type']); 
        $data['source_alias'] = $this->make_alias($data['client_source']); 
        $propsal = Propsal::create($data);
        return redirect('propsal');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $propsal = Propsal::find($id)->get();
        return view('propsal.show',['propsal'=>$propsal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $propsal = Propsal::find($id);
        $created_by             = $propsal->created_by()->first()->nice_name;
        $type_alias             = $propsal->type_alias;
        $source_alias           = $propsal->source_alias;
        $approved_by            = auth()->user()->nice_name;
        $data['approved_by']    = auth()->user()->id;
        $data['propsal_number'] = $propsal->id;
        $data['propsal_date']   = date('Y-m-d H:00');
        $data['code_criteria']  = strtoupper($type_alias.$approved_by.'-00'.$data['propsal_number'].'-'.$source_alias.$created_by);
        Propsal::where('id',$id)->update($data);
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function make_alias($value)
    {
        $oldValue = explode(' ', $value);
        
        if(count($oldValue)>1){
            $alias = $oldValue[0][0].$oldValue[1][0];
            return $alias;
        }else{
            $alias = $oldValue[0][0].$oldValue[0][1];
            return $alias;
        }
    }
}
