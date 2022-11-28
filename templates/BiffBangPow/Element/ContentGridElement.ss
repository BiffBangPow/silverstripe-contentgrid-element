<div class="container">
    <% if $Title && $ShowTitle %>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5">$Title</h2>
            </div>
        </div>
    <% end_if %>

    <% if $Content %>
        <div class="row">
            <div class="col-12">
                $Content
            </div>
        </div>
    <% end_if %>

    <% if $CTAType != 'None' %>
        <div class="row mt-3">
            <div class="cta col-12 text-center">
                <p>
                    <a href="$CTALink" class="cta-link btn btn-secondary"
                        <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                        <% else_if $CTAType == 'Download' %>download
                        <% end_if %>>
                        $LinkText
                    </a>
                </p>
            </div>
        </div>
    <% end_if %>

    <div class="row $GridClass mt-3">
        <% loop $ContentItems %>
            <div class="col">
                <% if $Title %>
                    <h3>$Title</h3>
                <% end_if %>
                $Content
                <% if $CTAType != 'None' %>
                    <div class="cta text-center">
                        <p>
                            <a href="$CTALink" class="cta-link btn btn-secondary"
                                <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                                <% else_if $CTAType == 'Download' %>download
                                <% end_if %>>
                                $LinkText
                            </a>
                        </p>
                    </div>
                <% end_if %>
            </div>
        <% end_loop %>
    </div>


</div>


