<div>
   <div>
    <div>
        <h1>Application Details with Dog Description</h1>
        <div>
            <h2>Applicant Details</h2>
           
                <p>Applicant Name:{{$applys->full_name }}</p>
                <p>Phone:{{ $applys->phone }}</p>
                <p>Email:{{ $applys->email }}</p>
                <p>Address:{{ $applys->address }}</p>   
        </div>
        <div>
            <h2>Dogs Details</h2>       
                <p>Name:{{ $applys->dog->name }}</p>
                <p>Age:{{ $applys->dog->age }}</p>
                <p>Breed:{{ $applys->dog->breed }}</p>
                <p>Description:{{ $applys->dog->description }}</p>      
        </div>
        <p>Thank you for Adopting {{ $applys->dog->name }}.</p>
    </div>
   </div>
</div>
