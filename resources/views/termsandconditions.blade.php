@extends('layouts.login')
@section('content')
				<div class="container well mt-3 justify-content-center">

								<h3 class="display-5 text-danger "> DukaVerse Terms and Conditions Policy</h3>

								<p class="content ">
												Welcome to <strong>DukaVerse Store</strong>.
								</p>

								<p class="display-7"> These terms and conditions outline the rules and regulations for the use of DukaVerse Store’s
												Website.</p>

								<p class="display-6">DukaVerse is an Online Application that enables its customers and users to manage and
												supervise their Retail and shop.
												We offer great services essential for growth of a retail shop.<br>
												By accessing this website we assume you accept these terms and conditions in full. Do not continue to use Storm5
												Store’s website if you do not accept all of the terms and conditions stated on this page.
								</p>

								<h5 class="display-6"> The following terminology applies to these Terms and Conditions, Privacy Statement and
												Disclaimer Notice and any or all Agreements:

								</h5>

								<ul>
												<li>
																Client, You and Your refers to you, the person accessing this
																website and accepting the Company’s terms and conditions.
												</li>
												<li>
																The Company, Ourselves, We, Our and Us, refers to our
																Company. Party, Parties, or
												</li>
												<li>Us, refers to both the Client and ourselves, or either the Client or ourselves.</li>
								</ul>

								<p class="well">All terms refer to the offer, acceptance and consideration of payment necessary to
												undertake the process of our
												assistance to the Client in the most appropriate manner, whether by formal meetings of a fixed duration, or any
												other means, for the express purpose of meeting the Client’s needs in respect of provision of the Company’s
												stated
												services/products, in accordance with and subject to, prevailing law of (Address).
												Any use of the above terminology or other words in the singular, plural, capitalisation and/or he/she or they,
												are
												taken as interchangeable and therefore as referring to same.
								</p>


								<h3 class="display-5 text-danger "> Cookies</h3>

								<p class="well">
												We employ the use of cookies. By using DukaVerse Store’s website you consent to the use of cookies in accordance
												with
												DukaVerse Store’s privacy policy. Most of the modern day interactive websites use cookies to enable us to
												retrieve
												user
												details for each visit.

												Cookies are used in some areas of our site to enable the functionality of this area and ease of use for those
												people
												visiting. Some of our affiliate / advertising partners may also use cookies.
								</p>
								<h3 class="display-5 text-danger "> License</h3>

								<p class="well">
												Unless otherwise stated, <strong>Storm Store</strong> and/or its licensors own the intellectual property rights
												for
												all material on (Store Name).

												All intellectual property rights are reserved. You may view and/or print pages from Your account for your own
												personal use subject to restrictions set in these terms and conditions.


								</p>
								<p><strong>You must not:</strong></p>
								<ul>
												<li>Republish material that is not directly associated with your DukaVerse account or is a property of DukaVerse
																.
																Sell, rent or sub-license your account to any third parties.
																Redistribute content from (Store Name) (unless content is specifically made for redistribution).
																Disclaimer</li>
												<li>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions
																relating to our website and the use of this website (including, without limitation, any warranties implied
																by law in
																respect of satisfactory quality, fitness for purpose and/or the use of reasonable care and skill).
												</li>
								</ul>
								<p class="text-danger">Nothing in this disclaimer will:
								</p>
								<ul>
												<li> Limit or exclude our or your liability for death or personal injury resulting from negligence.
												<li> Limit or exclude our or your liability for fraud or fraudulent misrepresentation.
												</li>
												<li> Limit any of our or your liabilities in any way that is not permitted under applicable law.</li>
												</li>
												<li>Or exclude any of our or your liabilities that may not be excluded under applicable law.
												</li>
								</ul>

								<h4 class="display-5"> The limitations and exclusions of liability set out in this Section and elsewhere in
												this disclaimer:
								</h4>
								<p class="well">are subject to the preceding paragraph; and
												govern all liabilities arising under the disclaimer or in relation to the subject matter of this disclaimer,
												including liabilities that arise in contract, tort (including negligence) and for breach of statutory duty.

								</p>

								<p>To the extent that the website and the information and services on the website are provided free of charge, we
												will
												not be liable for any loss or damage of any nature.
								</p>
								<div class="well m-3">
												<input class="form-check-input mb-1 @error('terms_and_conditions') is-invalid @enderror" type="checkbox"
																value="true" onclick="{{ route('termsandconditions') }}" id="terms_and_conditions "
																name="termsAndConditions" />
												<label class="form-check-label " for="form2Example3g">
																I agree all statements in
																<a href="/terms_and_conditions" class="text-body"><u>Terms of
																								service</u></a>
												</label>
								</div>
				</div>
@endsection
