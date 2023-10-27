<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('landing.contact');
    }
    // Store Contact Form data
    public function ContactForm(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // dd($request);
        //  Store data in database
        Contact::create($request->all());
        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');


        // Get the form data
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = $request->subject;
        $message = $request->message;

        // Save the form data to the database
        $contact = Contact::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
        ]);

        // Send a confirmation email to the user
        $to = $email;
        $subject = "Contact Form Submission Confirmation";
        $message = "Dear $name,

        Thank you for contacting us. Your message has been received and will be reviewed by our team.

        We will get back to you as soon as possible.

        Sincerely,
        The Nulish Team";

        mail($to, $subject, $message);

        // Flash a success message to the session
        session()->flash('success', 'Your message has been sent!');

        return redirect()->route('contact.store');
    }
}
