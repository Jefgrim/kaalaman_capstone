@extends('layouts.design')

@section('title')
    FAQ
@endsection
 
@section('faqContent')

<div class="centerContainer"> 
  <div class="centerContent"> 
    <a class="footerLinks" href="/"></a>
    
    <div class="accordion">
        <div class="contentBoxFaq">
            <h2>FAQs</h2>
            <div class="labelFaq">Can I post a thread as a guest?</div>
                <div class="contentFaq">
                    <p>
                        No. You have to be a registered member in order for you to post a thread.
                    </p>
                </div>
        </div>

        <div class="contentBoxFaq">
          <div class="labelFaq">Is this a safe and friendly environment?</div>
              <div class="contentFaq">
                  <p>
                      Yes. Here in Kaalaman, we made sure that every members are treated with respect. We do not tolerate any toxicity. 
                  </p>
              </div>
      </div>

      <div class="contentBoxFaq">
        <div class="labelFaq">What can I do with a member who shows offensive actions?</div>
            <div class="contentFaq">
                <p>
                    You can contact us and send us an email. If proven guilty, that member will be automatically banned from Kaalaman. 
                </p>
            </div>
    </div>

            <div class="contentBoxFaq">
                 <div class="labelFaq">I can post anything here?</div>
                    <div class="contentFaq">
                        <p>
                             Yes. As long it is not racist, sexist, slanderous, discriminatory, or containing extreme violence, adult materials, mature content, and files with virus, worm, trojan, spyware and other form of malwares.
                        </p>
                    </div>
            </div>

            <div class="contentBoxFaq">
                <div class="labelFaq">Is it free to be a member of Kaalaman?</div>
                    <div class="contentFaq">
                        <p>
                            Yes, it is free.  
                        </p>
                    </div>
            </div>
            
            <div class="contentBoxFaq">
                <div class="labelFaq">Can I have multiple accounts?</div>
                    <div class="contentFaq">
                        <p>
                            Yes, you can. As long as you follow the forum rules you should be fine.  
                        </p>
                    </div>
            </div>


        </div>

    </div>
</div>


@endsection