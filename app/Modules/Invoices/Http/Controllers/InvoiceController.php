<?php

namespace App\Modules\Invoices\Http\Controllers;

use App\Modules\Invoices\Contracts\Application\InvoiceApproverInterface;
use App\Modules\Invoices\Contracts\Application\InvoiceFinderInterface;
use App\Modules\Invoices\Contracts\Application\InvoiceRejectorInterface;
use App\Modules\Invoices\Exceptions\BadRequestException;
use Illuminate\Http\Request;
use App\Modules\Invoices\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Modules\Invoices\Contracts\Application\InvoicePaginatedListInterface;

class InvoiceController extends Controller
{
    /**
     * Approve an invoice
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function approve(Request $request): JsonResponse
    {
        $id = $request->input('id');

        $this->validateId($id);

        with(
            app(InvoiceApproverInterface::class),
            fn(InvoiceApproverInterface $approver) => $approver->approve($id)
        );

        return $this->sendResponse([], 'Success', 200);
    }

    /**
     * Reject an invoice
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function reject(Request $request): JsonResponse
    {
        $id = $request->input('id');

        $this->validateId($id);

        with(
            app(InvoiceRejectorInterface::class),
            fn(InvoiceRejectorInterface $rejector) => $rejector->reject($id)
        );

        return $this->sendResponse([], 'Success', 200);
    }

    /**
     * List an invoice
     *
     * @param string $id
     * @return JsonResponse
     * @throws Exception
     */
    public function show(string $id): JsonResponse
    {
        $this->validateId($id);

        $invoice = with(
            app(InvoiceFinderInterface::class),
            fn(InvoiceFinderInterface $finder) => $finder->find($id)
        );

        $data = [
            'invoice_id'     => $invoice->id,
            'invoice_number' => $invoice->number,
            'invoice_date'   => $invoice->date,
            'due_date'       => $invoice->dueDate,
            'status'         => $invoice->status,
            'company' => [
                'name'           => 'Company ABC',
                'street_address' => '123 Dooley Bridge',
                'city'           => 'Port Marlee',
                'zip_code'       => '51017-9006',
                'phone'          => '-',
                'email_address'  => 'todo',
            ],
            'products' => 'todo',
            // 'total_price' => array_sum(array_column($products, 'Total'))
        ];

        return $this->sendResponse($data, 'Success', 200);
    }

    /**
     * Lista invoices com paginação.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', "15");
        $paginator = with(
            app(InvoicePaginatedListInterface::class),
            fn(InvoicePaginatedListInterface $useCase) => $useCase->paginate((int) $perPage)
        );

        return response()->json(
            [
                'data' => $paginator->items(),
                'message' => 'Success',
                'status'  => 200,
                'meta' => [
                    'total' => $paginator->total(),
                    'per_page' => $paginator->perPage(),
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator->lastPage(),
                ],
            ],
            200
        );
    }

    /**
     * send a response
     *
     * @param array  $data
     * @param string $message
     * @param int    $status
     * @return JsonResponse
     */
    public function sendResponse($data = [], $message = '', $status = 200): JsonResponse
    {
        return response()->json(
            [
                'data'    => $data,
                'message' => $message,
                'status'  => $status
            ],
            $status
        );
    }

    /**
     * Validate the id
     *
     * @param string|null $id
     * @throws BadRequestException
     */
    protected function validateId(?string $id): void
    {
        if (empty($id)) {
            throw new BadRequestException("An Invoice id number is necessary to process this API.", 400);
        }
    }
}
